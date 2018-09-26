<?php

require_once("vendor/autoload.php");

use  \Slim\Slim;
use \Game\DB\Sql;
use \Game\PageAdmin;
use \Game\Page;


$app = new Slim();

$app->config('debug', true);

$app->get('/', function(){

	$page = new Page();

	$page->setTpl("index");

}); 

$app->get('/livro', function(){

	$page = new Page();

	$page->setTpl("book");

}); 

$app->get('/painel', function(){

	$page = new PageAdmin();

	$page->setTpl("index");

}); 

$app->run();

?>