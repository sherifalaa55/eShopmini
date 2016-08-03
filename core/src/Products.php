<?php
namespace core\src;
/**
* 
*/
class Products
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
		$product = new \core\models\Products();
		$result = $product->all();
		echo json_encode($result);
	}

	public function show()
	{
		$product = new \core\models\Products();
		$result = $product->findById($_GET['product_id']);
		echo json_encode($result);
	}

	public function add()
	{
		$product = new \core\models\Products();

		if(isset($_FILES["image"]['type']))
		{
			$temp_name  = $_FILES['image']['tmp_name'];
		    $image_name = $_FILES['image']['name'];
		    $extension  = explode(".", $_FILES["image"]["name"]);
		    $extension  = end($extension);
			$image_path = 'assets/images/'.$image_name;
			
		    if(isset($image_name))
		    {   
	            $location = 'assets/images/';     
	            move_uploaded_file($temp_name , $location. $_FILES['image']['name']);
	            $image = $image_path;
		   
		    else
		    {
		        $image = ''
		    }
		}
		$result = $product->insert([
			'name' => $_GET['name'],
			'category_id' => $_GET['category_id'],
			'image' => $image,
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
		$product = new \core\models\Products();

		if(isset($_FILES["image"]['type']))
		{
			$temp_name  = $_FILES['image']['tmp_name'];
		    $image_name = $_FILES['image']['name'];
		    $extension  = explode(".", $_FILES["image"]["name"]);
		    $extension  = end($extension);
			$image_path = 'assets/images/'.$image_name;
			
		    if(isset($image_name))
		    {   
	            $location = 'assets/images/';     
	            move_uploaded_file($temp_name , $location. $_FILES['image']['name']);
	            $image = $image_path;
		   
		    else
		    {
		        $image = ''
		    }
		}
		$result = $product->update($_GET['product_id'],
		 	[
			'name' => $_GET['name'],
			'image' => $image,
			'category_id' => $_GET['category_id']
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
		$product = new \core\models\Products();
		$result = $product->destroy($_GET['product_id']);

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

	public function parent()
	{
		global $dbo;
		if(!isset($_GET['category_id']) || $_GET['category_id'] == 0){
			$query = "SELECT * FROM products WHERE category_id IS NULL";
		}else{
			$cat_id = $_GET['category_id'];
			$query = "SELECT * FROM products WHERE category_id = ".$cat_id;
		}
		// die($query);
		$stm = $dbo->prepare($query);
		// $stm->bindParam(1,$cat_id);
		$stm->execute();
		echo json_encode($stm->fetchAll());
	}
}