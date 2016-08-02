<?php

use core\Router;
use core\models\Categories;
use core\models\Products;
use core\Authenticator;
$router = new Router();

$router->add('/' , 'Home');
$router->add('/' , 'Home' , 'add');
$router->add('/users/add' , 'Users' , 'add');
$router->add('/products' , 'Products');
$router->add('/login' , 'Login');
$router->add('/test' , function(){
	$cat = new Products();

	$auth = new Authenticator();
	// if($auth->authenticate("Sherif" , '123')){
	// 	echo "Logged In";
	// }else{
	// 	echo "Wrong username or password";
	// }
	
	// $cat->update($_GET['cat_id'] ,[
	// 	'name' => 'xxx',
	// 	'parent_id' => 1
	// 	]);
	// var_dump($cat->update(2,[
	// 	'name' => 'kamel',
	// 	'created_at' => date('Y-m-d')
	// 	]));
	var_dump(session_id());
});

$router->route();
