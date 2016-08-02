<?php

namespace core\models;
use core\Model;
/**
* 
*/
class Users extends Model
{
	protected $table = 'users';
	protected $fields = ['username', 'email' , 'password' , 'created_at' ];

	public $dbo;
	public function __construct()
	{
		global $dbo;
		$this->dbo = $dbo;
	}


	

}