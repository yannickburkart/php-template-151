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
		if (isset($_SESSION["email"])){
			header( "Location: /home");
			}
		else{
			//nicht eingelogt
			header( "Location: /login");
		}
		break;
		case "/login":
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				
				($factory->getLoginController())->login($_POST);		
			}
			else{
				($factory->getLoginController())->showLogin();
			}
		break;
		case "/home":
			
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				($factory->getHomeController())->logout($_SESSION);
			}
			else if(isset($_SESSION["email"]))
			{
				($factory->getLoginController())->loadToday($_SESSION);
			}
			else{		
				header( "Location: /login");
					}
			break;
		case "/createAccount":
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				($factory->getLoginController())->createacc($_POST);
			}
			else 
			{
				($factory->getIndexController())->showcreateacc();
				
			}
			break;
		case "/statistic":
			
				($factory->getLoginController())->statistic();
			break;
			case "/mail":
				$factory->getMailer()->send(
				Swift_Message::newInstance("Subject")
				->setFrom(["gibz.module.151@gmail.com" => "Yannick Burkart"])
				->setTo([$_SESSION["email"] => "Client"])
				->setBody("Ooops, feature still under construction. Ask page administrator for help.")
				);	
				($factory->getLoginController())->showLogin();
				
				
				break;
		case "/forgotPW":
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				($factory->getLoginController())->restorePW($_POST);	
			}
			else
			{
				($factory->getLoginController())->forgotPW();
			}
			break;
		case "/savetime":
				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					($factory->getLoginController())->saveTime($_POST);					
				}
				else if(isset($_SESSION["email"]))
				{		
					($factory->getIndexController())->loadToday($_SESSION);
				}
				else{
					header( "Location: /login");
				}
		$matches = [];
		if(preg_match("|^/hello/(.+)$|", $_SERVER["REQUEST_URI"], $matches)) {
			($factory->getIndexController())->greet($matches[1]);
			break;
		}
		echo "Not Found";
}

