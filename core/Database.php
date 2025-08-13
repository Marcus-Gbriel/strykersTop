<?php

namespace Core;

/**
 * 
 * Classe de controle de banco de dados
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 * 
 */
class Database
{
    private static ?PDO $connection = null;

    public function __construct()
    {
        echo "Conectando ao banco de dados...\n";
    }

    private static function connect(): PDO {}
}
