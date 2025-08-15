<?php

namespace Core;

/**
 * 
 * Classe para renderização de views/templates
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 * 
 */
class View
{
    private static array $data = [];
    private static string $layout = 'main';
    
    /**
     * Renderiza uma view com layout
     *
     * @param string $view Nome da view
     * @param array $data Dados para passar para a view
     * @param string $layout Layout a ser usado (opcional)
     * @return void
     */
    public static function render(string $view, array $data = [], string $layout = null): void
    {
        self::$data = $data;
        
        if ($layout !== null) {
            self::$layout = $layout;
        }
        
        $viewPath = self::getViewPath($view);
        $layoutPath = self::getLayoutPath(self::$layout);
        
        if (!file_exists($viewPath)) {
            Core::error("View não encontrada: " . $view);
        }
        
        // Captura o conteúdo da view
        ob_start();
        extract(self::$data);
        include $viewPath;
        $content = ob_get_clean();
        
        // Se não há layout, apenas retorna o conteúdo da view
        if (!file_exists($layoutPath)) {
            echo $content;
            return;
        }
        
        // Renderiza com layout
        extract(self::$data);
        include $layoutPath;
    }
    
    /**
     * Renderiza apenas uma view sem layout
     *
     * @param string $view Nome da view
     * @param array $data Dados para passar para a view
     * @return void
     */
    public static function renderOnly(string $view, array $data = []): void
    {
        self::$data = $data;
        $viewPath = self::getViewPath($view);
        
        if (!file_exists($viewPath)) {
            Core::error("View não encontrada: " . $view);
        }
        
        extract(self::$data);
        include $viewPath;
    }
    
    /**
     * Inclui uma partial (componente reutilizável)
     *
     * @param string $partial Nome da partial
     * @param array $data Dados específicos da partial
     * @return void
     */
    public static function partial(string $partial, array $data = []): void
    {
        $partialPath = DOCUMENT_ROOT . '/src/views/partials/' . $partial . '.php';
        
        if (!file_exists($partialPath)) {
            Core::error("Partial não encontrada: " . $partial);
        }
        
        // Mescla dados globais com dados específicos da partial
        $mergedData = array_merge(self::$data, $data);
        extract($mergedData);
        include $partialPath;
    }
    
    /**
     * Define dados globais para todas as views
     *
     * @param array $data
     * @return void
     */
    public static function share(array $data): void
    {
        self::$data = array_merge(self::$data, $data);
    }
    
    /**
     * Retorna o caminho completo da view
     *
     * @param string $view
     * @return string
     */
    private static function getViewPath(string $view): string
    {
        return DOCUMENT_ROOT . '/src/views/' . $view . '.php';
    }
    
    /**
     * Retorna o caminho completo do layout
     *
     * @param string $layout
     * @return string
     */
    private static function getLayoutPath(string $layout): string
    {
        return DOCUMENT_ROOT . '/src/views/layouts/' . $layout . '.php';
    }
    
    /**
     * Escapa HTML para prevenir XSS
     *
     * @param mixed $value
     * @return string
     */
    public static function escape($value): string
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
    
    /**
     * Gera URL baseada na configuração
     *
     * @param string $path
     * @return string
     */
    public static function url(string $path = ''): string
    {
        $baseUrl = CONFIG['base_url'] ?? '/';
        return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
    }
}
