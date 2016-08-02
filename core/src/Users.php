<?php
namespace core\src;

use \core\models\Users as User;

/**
* 
*/
class Users
{
	
	function __construct()
	{
		
	}

	public function add()
	{
		$user = new User();
		$user->insert([
			'username' => 'Sherif',
			'email' => 's@s.com',
			'password' => md5('123'),
			'created_at' => date('Y-m-d')
			]);

	}
}