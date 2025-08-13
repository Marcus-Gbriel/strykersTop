<?php

namespace Core;

/**
 * 
 * Classe principal do sistema
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 * 
 */
class Core
{
    public function __construct() {}

    public static function init()
    {
        $self = new \Core\Core();
        $self->VerifyDirectories();
        $configure = new \Core\Configure();
    }

    public static function error(string $message = ""): void
    {
        echo "error: $message";
        exit;
    }

    private function VerifyDirectories(): void
    {
        $directories = [
            DOCUMENT_ROOT . "/storage/logs/",
            DOCUMENT_ROOT . "/storage/cache/",
            DOCUMENT_ROOT . "/storage/uploads/"
        ];

        foreach ($directories as $dir) {
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
        }
    }
}
