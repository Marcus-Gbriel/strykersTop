<?php

namespace Core;

class View
{
    private static array $data = [];
    private static string $layout = 'main';

    /**
     * 
     * Renderiza uma view com os dados fornecidos.
     *
     * @param string $view Visualização
     * @param array $data Dados a serem passados para a view
     * @param string $layout Layout a ser utilizado
     * @return void
     * 
     */
    public static function render(string $view, array $data = [], string $layout = ''): void
    {
        self::$data = $data;

        if ($layout !== '') {
            self::$layout = $layout;
        }

        $viewPath = "";
    }

    /**
     * 
     * Renderiza uma view com os dados fornecidos.
     *
     * @param string $view Visualização
     * @param array $data Dados a serem passados para a view
     * @return void
     * 
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
     * 
     * Renderiza uma partial com os dados fornecidos.
     *
     * @param string $partial Partial a ser renderizada
     * @param array $data Dados a serem passados para a partial
     * @return void
     * 
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
     * 
     * Compartilha dados entre views.
     *
     * @param array $data Dados a serem compartilhados
     * @return void
     * 
     */
    public static function share(array $data): void
    {
        self::$data = array_merge(self::$data, $data);
    }

    /**
     * 
     * Obtém o caminho da view.
     *
     * @param string $view Visualização
     * @return string
     * 
     */
    public static function getViewPath(string $view): string
    {
        return DOCUMENT_ROOT . '/src/views/' . $view . '.php';
    }

    /**
     * 
     * Obtém o caminho do layout.
     *
     * @param string $layout Layout a ser utilizado
     * @return string
     * 
     */
    public static function getLayoutPath(string $layout): string
    {
        return DOCUMENT_ROOT . '/src/views/layouts/' . $layout . '.php';
    }

    /**
     * 
     * Escapa uma string para uso seguro em HTML.
     *
     * @param string $string String a ser escapada
     * @return string
     * 
     */
    public static function escape(string $string): string
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    /**
     * 
     * Gera uma URL absoluta.
     *
     * @param string $path Caminho a ser utilizado na URL
     * @return string
     * 
     */
    public static function url(string $path = ''): string
    {
        return rtrim('/', '/') . '/' . ltrim($path, '/');
    }
}
