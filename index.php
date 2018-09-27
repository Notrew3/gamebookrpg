<?php
session_start();
require_once("vendor/autoload.php");

use  \Slim\Slim;
use \Game\DB\Sql;
use \Game\PageAdmin;
use \Game\Page;
use \Game\Models\User;


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

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("index");

}); 

$app->get('/painel/login', function(){

	User::isLogged();

	$page = new PageAdmin(array(
		"header"=>false,
		"footer"=>false
	));

	$page->setTpl("login");

}); 

$app->post('/painel/login', function(){

	User::login($_POST["login"], $_POST["password"]);

	header("Location: /painel");
	exit;

}); 

$app->get('/painel/logout', function(){

	User::logout();

	header("Location: /painel/login");
	exit;
});

$app->get('/painel/add-book', function(){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("add-book");

}); 

$app->post('/painel/add-book', function(){

	echo "Post Book";

}); 

$app->run();

?>