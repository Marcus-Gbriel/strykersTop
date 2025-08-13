<?php
define('DOCUMENT_ROOT', __DIR__);
date_default_timezone_set('America/Sao_Paulo');

require_once DOCUMENT_ROOT . '/core/Autoloader.php';

\Core\Autoloader::ImportCore();
\Core\Core::init();

new \Core\Requests();
