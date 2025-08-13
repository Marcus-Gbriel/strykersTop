<?php

namespace Core\Routes;

/**
 * 
 * Classe para definir as rotas padrão da aplicação
 *
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 *
 */
class DefaultRoutes
{
    private static $defaultRoutes = [
        'GET' => [
            'home' => [
                'controller' => 'HomeController@index',
                'middleware' => 'Pages'
            ],
            'about' => [
                'controller' => 'AboutController@index',
                'middleware' => 'Pages'
            ],
            'contact' => [
                'controller' => 'ContactController@index',
                'middleware' => 'Pages'
            ],
            'login' => [
                'controller' => 'LoginController@index',
                'middleware' => 'Auth'
            ],
            'public' => [
                'controller' => 'PublicController@index',
                'middleware' => ''
            ]
        ],
        'POST' => [
            'api' => [
                'controller' => 'ApiController@index',
                'middleware' => ''
            ]
        ],
        'PATCH' => [
            'home' => [
                'controller' => 'HomeController@update',
                'middleware' => ''
            ],
            'about' => [
                'controller' => 'AboutController@update',
                'middleware' => ''
            ],
            'contact' => [
                'controller' => 'ContactController@update',
                'middleware' => ''
            ]
        ]
    ];

    public static function getRoutes(): array
    {
        return self::$defaultRoutes;
    }
}
