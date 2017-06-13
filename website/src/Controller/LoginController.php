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
		$this->loginService=$loginService;
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
			
			header("Location: /home");
			} else {
		//login again
			echo $this->template->render("login.html.php", [
					"email" => $data["email"],
					"errorMsg" => "Ungülitge Benutzerdaten",
					
			]);
		}
		
	}
	
	public function showLogin()
	{
		echo $this->template->render("login.html.php");	
	}
	public function createacc(array $data){
		if($this->loginService->createacc($data["email"], $data["password"])){
			if($this->loginService->authenticate($data["email"], $data["password"])) 
			{
				$_SESSION["email"]= $data["email"];
				header("Location: /home");
			}
		}
		else
		{	//email already taken
			header("Location: /createAccount");
				
		}
		
	}
	public function saveTime(array $data){
		if($this->loginService->saveTime($_SESSION["email"], $data["wsec"],$data["psec"])){
			header("Location: /home");
		}
		else
		{	//email already taken
			header("Location: /createAccount");
	
		}
	
	}
	public function statistic()
  	{
  	//echo $this->template->render("statistic.html.php");
  	
  	if($this->loginService->loadStat($_SESSION["email"])){
  		echo $this->template->render("statistic.html.php");
  	}
  	else
  	{	//email already taken
  	header("Location: /createAccount");
  	
  	}
  }
	
}
