<?php

error_reporting(E_ALL);
session_start();

require_once("../vendor/autoload.php");

$config = parse_ini_file(__DIR__ . "/../config.ini");

$factory = new yannickburkart\Factory($config);
$pdo = $factory->getPDO();
$tmpl = $factory->getTemplateEngine();

$loginService = $factory->getLoginService();

switch($_SERVER["REQUEST_URI"]) {
	case "/":
		($factory->getIndexController())->homepage();
		break;
	case "/testrout":
		echo "test";
		break;
		case "/login":
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				
				($factory->getLoginController())->login($_POST);		
			}
			else{
				($factory->getLoginController())->showLogin();
			}
		break;
	default:
		$matches = [];
		if(preg_match("|^/hello/(.+)$|", $_SERVER["REQUEST_URI"], $matches)) {
			($factory->getIndexController())->greet($matches[1]);
			break;
		}
		echo "Not Found";
}

