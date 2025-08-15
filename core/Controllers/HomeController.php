<?php

namespace Core\Controllers;

class HomeController
{
    public function index()
    {
        $data = [
            'title' => 'Início - StrykersNet',
            'description' => 'Página inicial do StrykersNet - Aplicação web moderna',
            'currentPage' => 'home',
            'welcomeMessage' => 'Bem-vindo ao StrykersNet! Uma aplicação web moderna e eficiente.',
            'features' => [
                [
                    'title' => 'Arquitetura MVC',
                    'description' => 'Estrutura organizada seguindo o padrão Model-View-Controller',
                    'icon' => 'fas fa-sitemap',
                    'link' => 'about'
                ],
                [
                    'title' => 'Sistema de Roteamento',
                    'description' => 'Roteamento inteligente para gerenciar URLs e requisições',
                    'icon' => 'fas fa-route',
                    'link' => 'about'
                ],
                [
                    'title' => 'Sistema de Logs',
                    'description' => 'Monitoramento e registro de eventos do sistema',
                    'icon' => 'fas fa-file-alt',
                    'link' => 'about'
                ]
            ],
            'showStats' => true,
            'stats' => [
                ['value' => '100%', 'label' => 'Tempo Online'],
                ['value' => '5ms', 'label' => 'Tempo de Resposta'],
                ['value' => '99.9%', 'label' => 'Disponibilidade'],
                ['value' => 'PHP 8+', 'label' => 'Tecnologia']
            ]
        ];

        \Core\View::render('home', $data);
    }

    public function update()
    {
        // Lógica para atualizar informações na página inicial
        #echo "Informações atualizadas com sucesso! <br>";
    }
}
