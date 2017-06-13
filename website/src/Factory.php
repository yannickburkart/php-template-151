<?php
namespace yannickburkart;

 class Factory{
 	
 	private $config;
 	
 	public function __construct(array $config)
 	{
 		
 	}
 	
 	
 	
 	public function getTemplateEngine()
 	{
 		return new SimpleTemplateEngine(__DIR__ . "/../templates/");
 			
 	}
 	public function getIndexController()
 	{
 		return new Controller\IndexController($this->getTemplateEngine());
 	
 	}
 	public function getHomeController()
 	{
 		return new Controller\HomeController($this->getTemplateEngine());
 	
 	}
 	public function getPDO()
 	{
 		return new \PDO(
		"mysql:host=mariadb;dbname=app;charset=utf8",
		"root",
		"my-secret-pw",
		[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
		);
 	
 	}
 	public function getLoginService()
 	{
 	 		return new Service\Login\LoginPDOService($this->getPDO());
 	}
 
 	public function getLoginController()
 	{
 		return new  Controller\LoginController($this->getTemplateEngine(), $this->getLoginService());
 	}
 	
 	
 }