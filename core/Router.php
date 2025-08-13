<?php

namespace Core;

/**
 * 
 * Classe para tratar rotas do sistema
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 * 
 */
class Router
{
    private static $DefaultRoutes = [];

    public function __construct()
    {
        self::$DefaultRoutes = DefaultRoutes::getRoutes();
    }

    /**
     * 
     * Lida com a requisição recebida.
     *
     * @param string $method Método da requisição
     * @param string $uri Local da requisição
     * @return void
     * 
     */
    private function HandleRequest(string $method, string $uri): void
    {
        $routes = self::$DefaultRoutes;
        if (isset($routes[$method][$uri])) {
            $route = $routes[$method][$uri];
            $this->ExecuteController($route['controller']);
            $this->ExecuteMiddleware($route['middleware']);
        } else {
            Core::error("Rota não encontrada: " . $uri);
        }
    }

    /**
     * 
     * Executa o controlador especificado.
     *
     * @param string $controller Nome do controlador
     * @return void
     * 
     */
    private function ExecuteController(string $controller): void
    {
        $Controller = explode('@', $controller);
        $file = DOCUMENT_ROOT . '/core/Controllers/' . $Controller[0] . '.php';
        if (!file_exists($file)) {
            Core::error("Controlador não encontrado: " . $Controller[0]);
        }

        require_once $file;

        $controllerClass = '\\Core\\Controllers\\' . $Controller[0];

        if (!class_exists($controllerClass)) {
            Core::error("Classe de controlador não encontrada: " . $controllerClass);
        }

        $controllerClass = new $controllerClass();

        $controllerMethod = $Controller[1];

        if (!method_exists($controllerClass, $controllerMethod)) {
            Core::error("Método de controlador não encontrado: " . $controllerMethod);
        }
        
        $controllerClass->$controllerMethod();
    }

    /**
     * Executa o middleware especificado.
     *
     * @param string $middleware Nome do middleware
     * @return void
     * 
     */
    private function ExecuteMiddleware(string $middleware): void
    {
        $file = DOCUMENT_ROOT . '/core/Middleware/' . $middleware . '.php';

        if (!file_exists($file)) {
            Core::error("Middleware não encontrado: " . $middleware);
        }

        require_once $file;

        $middlewareClass = '\\Core\\Middleware\\' . $middleware;

        if (!class_exists($middlewareClass)) {
            Core::error("Classe de middleware não encontrada: " . $middlewareClass);
        }

        $middlewareInstance = new $middlewareClass();

        if (!method_exists($middlewareInstance, 'handle')) {
            Core::error("Método 'handle' não encontrado na classe de middleware: " . $middlewareClass);
        }

        $middlewareInstance->handle();
    }

    /**
     * 
     * Executa o middleware especificado.
     *
     * @param string $uri Local da requisição
     * @param string $method Método da requisição
     * @return void
     * 
     */
    public static function run(string $uri, string $method)
    {
        $self = new self();
        $self->HandleRequest($method, $uri);
    }
}
