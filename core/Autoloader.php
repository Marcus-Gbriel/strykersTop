<?php

namespace Core;

/**
 * 
 * Classe para autoload de classes
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 * 
 */
class Autoloader
{
    private static array $CoreDependencies = [
        'Core.php',
        'Database.php',
        'Requests.php',
        'Router.php',
        'Configure.php',
        'Logger.php',
        'View.php'
    ];

    public function __construct()
    {
        $this::ImportCore();
    }

    public static function ImportCore(): void
    {
        foreach (self::$CoreDependencies as $file) {
            require_once DOCUMENT_ROOT . '/core/' . $file;
        }
    }
}
