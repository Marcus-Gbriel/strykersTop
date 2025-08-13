<?php

namespace Core;

/**
 * 
 * Classe para configuração do sistema
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 * 
 */
class Configure
{
    private static array $settings = [];

    public function __construct()
    {
        $this->Load();
        $this->Define();
    }

    private function Load(): void
    {
        $file = DOCUMENT_ROOT . "/config.json";
        if (file_exists($file)) {
            $config = json_decode(file_get_contents($file), true);
            if (json_last_error() === JSON_ERROR_NONE) {
                if (self::$settings !== $config) {
                    self::$settings = $config;
                    \Core\Logger::log("success to import configurations");
                }
            } else {
                \Core\Core::error("Erro ao ler o arquivo de configuração: " . json_last_error_msg());
            }
        } else {
            \Core\Core::error("Arquivo de configuração não encontrado.");
        }
    }

    private function Define(): void
    {
        define("CONFIG", self::$settings);
    }
}
