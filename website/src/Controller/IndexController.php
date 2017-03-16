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
    echo "INDEX";
  }

  public function greet($name) {
  	echo $this->template->render("hello.html.php", ["name" => $name]);
  }
  public function showLogin()
  {
  	echo $this->template->render("login.html.php");
  }
 
}
