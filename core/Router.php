<?php

namespace core;

/**
* 
*/
class Router
{

	private $routes = array();
	
	private $calls = array();
	
	private $methods = array();


	
	public function add($uri, $function = null , $method = 'index')
	{
		$uri = '/' . trim($uri, '/');
		$this->routes[] = $uri;
		$this->methods[] = $method;
		if($function){
			$this->calls[] = $function;
		}
	}

	public function route()
	{	
		$uri = isset($_REQUEST['uri']) ? '/' . $_REQUEST['uri'] : '/';
		foreach ($this->routes as $key => $value)
		{
			if (preg_match("#^$value$#", $uri))
			{

				if(is_string($this->calls[$key])){
					$call = 'core\src\\' . $this->calls[$key];
					$class = new $call();
					$method = $this->methods[$key];
					$class->$method(); 
				}				
				else{
					call_user_func($this->calls[$key]);
				}
				break;
			}
		}
		
	}
}