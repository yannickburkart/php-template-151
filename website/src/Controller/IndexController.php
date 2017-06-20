<?php

namespace yannickburkart\Controller;

use yannickburkart\SimpleTemplateEngine;

class IndexController 
{
  /**
   * @var yannickburkart\SimpleTemplateEngine Template engines to render output
   */
  private $template;

  
  /**
   * @param yannickburkart\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template)
  {
     $this->template = $template;
     
  }
  public function homepage() {
  	echo $this->template->render("login.html.php");
  }
  public function home(){
		echo $this->template->render("home.html.php");
  }
  public  function showcreateacc(){
  	  	echo $this->template->render("createacc.html.php");
  	
  }
  
  public function showLogin()
  {
  	   	echo $this->template->render("login.html.php");
  }
  
 
 
}
