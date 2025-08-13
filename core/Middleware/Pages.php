<?php

namespace Core\Middleware;

class Pages
{
    public function __construct()
    {
        // Inicialização da página
        echo "Página inicializada! <br>";
    }

    public function handle()
    {
        // Lógica de manipulação da página
        echo "Manipulando a página! <br>";
    }
}
