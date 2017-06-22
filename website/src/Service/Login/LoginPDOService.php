<?php

namespace yannickburkart\Service\Login;

class LoginPDOService implements LoginService
{
	private $pdo;
	public function __construct(\PDO $pdo)
	{
	 $this->pdo =$pdo;
	}
	
	public function authenticate($username, $password)
	{
		$stmt = $this ->pdo->prepare("SELECT * FROM user WHERE email=? AND password=?");
		$stmt->bindValue(1, $username);
		$stmt->bindValue(2, $password);
		$stmt->execute();
		
		if($stmt->rowCount() == 1) {
		$_SESSION["email"] = $username;
		return true;
		} else {
			return false;
		}
		
		
	}
	public function createacc($username, $password)
	{
		//check if exist
		$stmt = $this ->pdo->prepare("SELECT * FROM user WHERE email=? ");
		$stmt->bindValue(1, $username);
		$stmt->execute();
		if($stmt->rowCount() == 0) {
			$stmt = $this ->pdo->prepare("INSERT INTO user (email, password) VALUES (?,?)");
			$stmt->bindValue(1, $username);
			$stmt->bindValue(2, $password);
			$stmt->execute();
			return true;
			
		} else {
			return false;
				
		}
	}
	public function saveTime($username,$worksec,$breaksec)
	{
		$worksec=intval($worksec);
		$breaksec=intval($breaksec);
		
		$stmt = $this ->pdo->prepare("SELECT SUM(worksec),Sum(breaksec)  FROM work WHERE User_email=? AND Date Like ?");
		$stmt->bindValue(1, $username);
		$heute=(string)date("Y-m-d");
		$heute=$heute."%";
		$stmt->bindValue(2,$heute);
		$stmt->execute();
		$result = $stmt->fetchAll();
		
		$worksec=$worksec-$result[0][0];
		$breaksec=$breaksec-$result[0][1];
		
		$stmt = $this ->pdo->prepare("SELECT * FROM user WHERE email=? ");
		$stmt->bindValue(1, $username);
		$stmt->execute();
		if($stmt->rowCount() == 1) {
			$stmt = $this ->pdo->prepare("INSERT INTO work (worksec, breaksec, User_email, Date) VALUES (?,?,?,?)");
			$stmt->bindValue(1,$worksec);
			$stmt->bindValue(2,$breaksec);
			$stmt->bindValue(3,$username);
			$stmt->bindValue(4,NULL);
			$stmt->execute();
			return true;
		}
		return false;
	}
	public function loadStat($username)
	{
		
		
		$stmt = $this ->pdo->prepare("SELECT SUM(worksec),Sum(breaksec)  FROM work WHERE User_email=? ");
		$stmt->bindValue(1, $username);
		$stmt->execute();
		$result = $stmt->fetchAll();
		$_SESSION["worksec"]=$result[0][0];
		$_SESSION["breaksec"]=$result[0][1];
		$stmt = $this ->pdo->prepare("SELECT SUM(worksec),Sum(breaksec)  FROM work WHERE User_email=? AND Date Like ?");
		$stmt->bindValue(1, $username);
		$heute=(string)date("Y-m-d");
		$heute=$heute."%";
		$stmt->bindValue(2,$heute);
		$stmt->execute();
		$result = $stmt->fetchAll();
		$_SESSION["worksectoday"]=$result[0][0];
		$_SESSION["breaksectoday"]=$result[0][1];
		return true;
		
    }
    public function loadToday($username)
    {
       	$stmt = $this ->pdo->prepare("SELECT SUM(worksec),Sum(breaksec)  FROM work WHERE User_email=? AND Date Like ?");
    	$stmt->bindValue(1, $username);
    	$heute=(string)date("Y-m-d");
    	$heute=$heute."%";
      	$stmt->bindValue(2,$heute);
     	$stmt->execute();
    	$result = $stmt->fetchAll();
    	$_SESSION["worksec"]=$result[0][0];
    	$_SESSION["breaksec"]=$result[0][1];
    	return true;
    
    }
    public  function getPW($username)
    {
    	$stmt = $this ->pdo->prepare("SELECT * FROM user WHERE email=?");
    	$stmt->bindValue(1, $username);
    	$stmt->execute();
    	$result = $stmt->fetchAll();
    	 
    	if($stmt->rowCount() == 1) {
    		$_SESSION["email"] = $username;
    		//send tokens instead of pw
    		return true;
    	} else {
    		return false;
    	}
    }
}
?>
