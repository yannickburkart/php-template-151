<?php

namespace yannickburkart\Controller;

use yannickburkart\SimpleTemplateEngine;

class HomeController
{
	/**
	 * @var yannickburkart\SimpleTemplateEngine Template engines to render output
	 */
	private $template;
	/**
	 * @param yannickburkart\SimpleTemplateEngine
	 */
	
	/* public function __construct(SimpleTemplateEngine $template, LoginService $loginService)
	{
		$this->template = $template;
		$this->loginService = $loginService;
	} */
	public function logout(array $data)
	{
		
		unset($_SESSION["email"]);
		header("Location: /login");
		
    }
	
    public function hello(array $data)
    {
    	echo $this->template->render("hello.html.php");
    }
    
	public function showLogin()
	{
		echo $this->template->render("login.html.php");	
	}
}
