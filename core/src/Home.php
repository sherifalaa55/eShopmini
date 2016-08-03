<?php
namespace core\src;

use core\TemplateLoader;
/**
* 
*/
class Home 
{
	
	function __construct()
	{
		
	}

	public function index()
	{
		$tmpl = new TemplateLoader();
		$tmpl->load('core.php')->render();
	}

	public function add()
	{
		echo "home - add";
	}
}