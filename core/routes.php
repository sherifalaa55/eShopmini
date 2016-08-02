<?php

use core\Router;

$router = new Router();

// -------------------- bootstrap angular application ---------------------//
$router->add('/' , 'Home');

// -------------------- login Request ---------------------//
$router->add('/login' , 'Login');

// -------------------- Categories API ---------------------//
$router->add('/categories' , 'Categories');
$router->add('/categories/show' , 'Categories' , 'show');
$router->add('/categories/add' , 'Categories' , 'add');
$router->add('/categories/edit' , 'Categories' , 'edit');
$router->add('/categories/delete' , 'Categories' , 'destroy');
$router->add('/categories/children' , 'Categories' , 'children');

// -------------------- Products API ---------------------//
$router->add('/products' , 'Products');
$router->add('/products/show' , 'Products' , 'show');
$router->add('/products/add' , 'Products' , 'add');
$router->add('/products/edit' , 'Products' , 'edit');
$router->add('/products/delete' , 'Products' , 'destroy');

// $router->add('/users/add' , 'Users' , 'add');

// -------------------- starting matching routes ---------------------//
$router->route();
