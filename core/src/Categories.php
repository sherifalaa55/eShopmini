<?php
namespace core\src;

use core\Authenticator;

/**
* 
*/
class Categories
{
	
	function __construct()
	{
		$auth = new Authenticator();
		if(!$auth->check()){
			$auth->logout();
		}
	}

	public function index()
	{
		$category = new \core\models\Categories();
		$result = $category->all();
		echo json_encode($result);
	}

	public function show()
	{
		$category = new \core\models\Categories();
		$result = $category->findById($_GET['category_id']);
		echo json_encode($result);
	}

	public function add()
	{
		$category = new \core\models\Categories();
		$result = $category->insert([
			'name' => $_GET['name'],
			'parent_id' => isset($_GET['parent_id'])?$_GET['parent_id']:null,
			'created_at' => date('Y-m-d')
			]);

		if($result){
			echo json_encode([
				'code' => '200',
				'id'   => $result
				]);
		}else{
			echo json_encode([
				'error' => 'unsuccessful operation'
				]);
		}
	}

	public function edit()
	{
		$category = new \core\models\Categories();
		$result = $category->update($_GET['category_id'],
		 	[
			'name' => $_GET['name'],
			'parent_id' => isset($_GET['parent_id'])?$_GET['parent_id']:null,
			]);

		if($result == true){
			return json_encode([
				'code' => '200'
				]);
		}else{
			return json_encode([
				'error' => 'unsuccessful operation'
				]);
		}
	}

	public function destroy($value='')
	{
		$category = new \core\models\Categories();
		$result = $category->destroy($_GET['category_id']);

		if($result == true){
			return json_encode([
				'code' => '200'
				]);
		}else{
			return json_encode([
				'error' => 'unsuccessful operation'
				]);
		}
	}

	public function children()
	{
		global $dbo;
		if(!isset($_GET['category_id']) || $_GET['category_id'] == 0){
			$query = "SELECT * FROM categories WHERE parent_id IS NULL";
		}else{
			$cat_id = $_GET['category_id'];
			$query = "SELECT * FROM categories WHERE parent_id = ".$cat_id;
		}
		// die($query);
		$stm = $dbo->prepare($query);
		// $stm->bindParam(1,$cat_id);
		$stm->execute();
		echo json_encode($stm->fetchAll());
	}
}