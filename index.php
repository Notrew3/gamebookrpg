<?php

require_once("vendor/autoload.php");

use  \Slim\Slim;
use DB\Sql;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function(){

	$sql = new Sql();

	$results = $sql->select("SELECT * FROM tb_users");

	echo json_encode($results);

}); 

$app->get('/sobre', function(){



}); 

$app->run();

?>