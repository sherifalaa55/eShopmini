<?php
namespace core;
/**
* 	
*/
class Authenticator
{
	public $dbo;
	
	function __construct()
	{
		global $dbo;
		$this->dbo = $dbo;
	}

	public function authenticate($username , $password)
	{
		$query = "SELECT * FROM users WHERE username = ? AND password = ?";
		$stm = $this->dbo->prepare($query);
		$stm->bindParam(1, $username);
		$stm->bindParam(2, md5($password));
		$stm->execute();
		$result = $stm->fetch();
		if($result){
			$_SESSION['user_id'] = session_id();
			return 1;
		}else{
			return 0;
		}
	}

	public function check()
	{
		if($_SESSION['user_id'] == session_id()){
			return 1;
		}
		session_destroy();
		return 0;
	}

	public function logout()
	{
		session_destroy();
		header("location: index.php");
	}
}