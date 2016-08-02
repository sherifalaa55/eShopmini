<?php

namespace core;

use \Exception;

class TemplateLoader{
	public $path;
	public $tmpl;
    public function __construct(){
        $this->path = APP_PATH . "core/templates/";
    }

    public function load($viewName){
        if( file_exists($this->path.$viewName) ){
            $this->tmpl = require($this->path.$viewName);
            return $this;
        }else{
        	throw new Exception("Template does not exist: ".$this->path.$viewName);
        }
    }

    public function render()
    {
    	if($this->tmpl != NULL){
    		echo $this->tmpl;
    	}else{
    		throw new Exception("No Template is loaded");
    	}
    }
}