<?php

namespace Core\Middleware;

use Core\Logger;

class Pages
{
    public function __construct()
    {
        #Logger::Log("Página inicializada!");
        #require_once DOCUMENT_ROOT . '/src/components/index.html';
    }

    public function handle()
    {
        // Lógica de manipulação da página
        #echo "Manipulando a página! <br>";
    }
}
