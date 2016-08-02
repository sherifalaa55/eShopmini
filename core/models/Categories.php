<?php

namespace core\models;
use core\Model;
/**
* 
*/
class Categories extends Model
{
	protected $table = 'categories';
	protected $fields = ['name' , 'parent_id', 'created_at'];

	public $dbo;
	public function __construct()
	{
		global $dbo;
		$this->dbo = $dbo;
	}


}