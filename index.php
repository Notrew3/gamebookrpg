<?php
session_start();
require_once("vendor/autoload.php");

use  \Slim\Slim;
use \Game\DB\Sql;
use \Game\PageAdmin;
use \Game\Page;
use \Game\Models\User;
use \Game\Models\Book;


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
	$user = User::userSession();
	$categories = Book::allCategories();

	$page = new PageAdmin();

	$page->setTpl("add-book",array(
		"user"=>$user,
		"categories"=>$categories
	));

}); 

$app->post('/painel/add-book', function(){
	User::verifyLogin();
	$last_id = Book::insertBook($_POST["nome"], $_POST["categoria"], $_POST["id_user"]);

	header("Location: /painel/my-books");
	exit;

}); 
$app->get('/painel/my-books', function(){

	User::verifyLogin();
	$user = User::userSession();
	$categories = Book::allCategories();
	$books = Book::myBooks($user["id"]);

	$page = new PageAdmin();

	$page->setTpl("my-books",array(
		"user"=>$user,
		"categories"=>$categories,
		"books"=>$books
	));

}); 

$app->run();

?>