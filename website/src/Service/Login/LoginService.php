<?php
namespace yannickburkart\Service\Login;

interface LoginService {
	public function authenticate($username, $password);
}