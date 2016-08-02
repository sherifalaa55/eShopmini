<?php
namespace core\src;
/**
* 
*/
class Products
{
	
	function __construct()
	{
		# code...
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
		$result = $product->insert([
			'name' => $_GET['name'],
			'category_id' => $_GET['category_id'],
			'image' => 'x',
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
		$result = $product->update($_GET['product_id'],
		 	[
			'name' => $_GET['name'],
			'image' => 'x',
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
}