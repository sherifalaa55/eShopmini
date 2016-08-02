<?php

require_once('autoload.php');

$db_config = require_once('config/database.php');

$connection = new core\database\Connection($db_config);
$dbo = $connection->connectToDb();

require_once(APP_PATH . 'core/helpers/assets.php');
require_once(APP_PATH . 'core/routes.php');