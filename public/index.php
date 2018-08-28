<?php
namespace PHPMVC;

use PHPMVC\LIB\FrontController;
use PHPMVC\LIB\Template;

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

require_once '..' . DS . 'app' . DS . 'config' . DS . 'config.php';
require_once APP_PATH . DS . 'lib' . DS . 'autoload.php';
$template_parts = require_once '..' . DS . 'app' . DS . 'config' . DS . 'templateconfig.php';

session_start();

$template = new Template($template_parts);

$frontController = new FrontController($template);
$frontController->displatch();
?>

