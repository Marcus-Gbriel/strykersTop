<?php

namespace Core;

/**
 * 
 * Classe para tratar requisições HTTP
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 */
class Requests
{
    public function __construct()
    {
        Router::run(self::GetUri(), self::GetMethod());
    }

    /**
     * 
     * Retorna a URI da requisição
     *
     * @param integer $key
     * @return string
     * 
     */
    public static function GetUri(int $key = 0): string
    {
        $uri = trim($_SERVER['REQUEST_URI'] ?? '/home', '/');

        $uri = explode('/', $uri)[$key];
        $uri = explode('?', $uri)[0];

        if ($uri === '') {
            $uri = 'home';
        }

        return $uri;
    }

    /**
     * 
     * Retorna os parâmetros da URL
     *
     * @return array
     * 
     */
    public static function GetParams(): array
    {
        $uri = trim($_SERVER['REQUEST_URI'], '/');
        $uri = explode('/', $uri);
        $uri = array_pop($uri);

        $params = explode('?', $uri) ?? [];
        $params = explode('&', $params[1] ?? '');

        return $params;
    }

    /**
     * 
     * Retorna um parâmetro da URL
     *
     * @param string $key
     * @return string|null
     * 
     */
    public static function GetParam(string $key): ?string
    {
        $params = self::GetParams();
        return $params[$key] ?? null;
    }

    /**
     * 
     * Retorna o método da requisição
     *
     * @return string
     * 
     */
    public static function GetMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }

    /**
     * 
     * Define o código de status da resposta HTTP
     *
     * @param int $code Código de status
     * @return void
     * 
     */
    public static function SetStatusCode(int $code = 200): void
    {
        http_response_code($code);
    }
}
