<?php

namespace yannickburkart\Controller;

use yannickburkart\SimpleTemplateEngine;
use yannickburkart\Service\Login\LoginService;

class LoginController
{
	/**
	 * @var yannickburkart\SimpleTemplateEngine Template engines to render output
	 */
	private $template;
	private $loginService;

	/**
	 * @param yannickburkart\SimpleTemplateEngine
	 */
	
	public function __construct(SimpleTemplateEngine $template, LoginService $loginService)
	{
		$this->template = $template;
		$this->loginService = $loginService;
	}
	public function login(array $data)
	{
		//log in again hacker....
		if(!array_key_exists("email", $data) OR !array_key_exists("password", $data)) {
			$this->showLogin();
			
			return;
		}
		// login
		if($this->loginService->authenticate($data["email"], $data["password"])) {
			$_SESSION["email"]= $data["email"];
			
			header("Location: /");
		} else {
		//login again
			echo $this->template->render("login.html.php", [
					"email" => $data["email"],
					"errorMsg" => "Ung benutyerdaten",
					
			]);
		}
		
	}
	
	public function showLogin()
	{
		echo $this->template->render("login.html.php");	
	}
}
