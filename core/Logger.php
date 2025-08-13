<?php

namespace Core;

use DateTime;

/**
 * 
 * Classe para tratamento de logs do sistema
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 * 
 */
class Logger
{
    private static string $LogFile;

    public function __construct()
    {
        self::$LogFile = '/storage/logs/' . date('Y_m_d') . '.log';
    }

    private function VerifyLogFile(): void
    {
        $LogFile = DOCUMENT_ROOT . self::$LogFile;

        if (!is_dir(dirname($LogFile))) {
            mkdir(dirname($LogFile), 0755, true);
        }
    }

    private function put(string $message, $level = 'info'): void
    {
        $this->VerifyLogFile();
        $LogFile = DOCUMENT_ROOT . self::$LogFile;
        $DateTime = date('Y-m-d H:i:s');

        file_put_contents($LogFile, "[$DateTime] [$level] $message" . PHP_EOL, FILE_APPEND);
    }

    public static function Log(string $message, $level = 'info'): void
    {
        $self = new self();
        $self->put($message, $level);
    }
}
