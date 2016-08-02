<?php

namespace core\database;
use \PDO;
/**
* 
*/
class Connection
{
	private $db_name = '';
	private $db_host = '';
	private $db_password = '';
	private $db_user = '';
	private $db;
	function __construct(array $config)
	{
		$this->db_name = $config['db_name'];
		$this->db_host = $config['db_host'];
		$this->db_password = $config['db_password'];
		$this->db_user = $config['db_user'];
	}

	public function connectToDb()
	{
		try 
		{
		    $this->db = new PDO("mysql:host={$this->db_host};dbname={$this->db_name}", $this->db_user, $this->db_password);
		    // set the PDO error mode to exception
		    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
		    echo "Connection failed: " . $e->getMessage();
		}

		return $this->db;
	}

	public function getDb()
	{
		if($this->db != null){
			return $this->db;
		}
		die('');
	}

	public function closeConnection()
	{
		$this->db = null;
	}
}