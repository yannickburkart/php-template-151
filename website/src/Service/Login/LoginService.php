<?php
namespace yannickburkart\Service\Login;

interface LoginService {
	public function authenticate($username, $password);
	public function createacc($username, $password);
	public function saveTime($username,$worksec, $breaksec);
	public function loadStat($username);
	
}