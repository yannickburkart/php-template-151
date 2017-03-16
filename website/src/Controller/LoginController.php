<?php

namespace yannickburkart\Controller;

use yannickburkart\SimpleTemplateEngine;

class LoginController
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
	public function showLogin()
	{
		echo $this->template->render("login.html.php");	
	}
}
