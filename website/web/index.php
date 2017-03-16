<?php

use yannickburkart\Controller\LoginController;

error_reporting(E_ALL);

require_once("../vendor/autoload.php");
$tmpl = new yannickburkart\SimpleTemplateEngine(__DIR__ . "/../templates/");


switch($_SERVER["REQUEST_URI"]) {
	case "/":
		(new yannickburkart\Controller\IndexController($tmpl))->homepage();
		break;
	case "/testrout":
		echo "test";
		break;
		case "/login":
			(new LoginController($tmpl))->showLogin();
		break;
	default:
		$matches = [];
		if(preg_match("|^/hello/(.+)$|", $_SERVER["REQUEST_URI"], $matches)) {
			(new yannickburkart\Controller\IndexController($tmpl))->greet($matches[1]);
			break;
		}
		echo "Not Found";
}

