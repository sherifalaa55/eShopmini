<?php

function isCommandLineInterface()
{
    return (php_sapi_name() === 'cli');
}

if(!isCommandLineInterface()){
	die(php_sapi_name());
}