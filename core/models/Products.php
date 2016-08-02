<?php

namespace core\models;
use core\Model;
/**
* 
*/
class Products extends Model
{
	protected $table = 'products';
	protected $fields = ['name' , 'created_at'];

	public $dbo;
	public function __construct()
	{
		global $dbo;
		$this->dbo = $dbo;
	}


	

}