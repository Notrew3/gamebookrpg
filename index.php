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

	$page->setTpl("book");

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
	/*
	array (size=3)
      'id' => string '1' (length=1)
      'nome_livro' => string 'Horda de Ovinis' (length=15)
      'nome_categoria' => string 'Alienigenas' (length=11)
	*/

	$page = new PageAdmin();

	$page->setTpl("my-books",array(
		"user"=>$user,
		"categories"=>$categories,
		"books"=>$books
	));

}); 

$app->get('/painel/my-books/:book_id/add-cap', function($book_id){

	User::verifyLogin();
	$user = User::userSession();
	$book = Book::book($book_id, $user['id']);
	
	$page = new PageAdmin();
	
	$page->setTpl("add-cap", array(
		"user"=>$user,
		"book"=>$book
	));

	
});

$app->post('/painel/my-books/add-cap', function(){
	User::verifyLogin();
	$last_id = Book::insertChapter($_POST["id_book"], $_POST["titulo_cap"], $_POST["sub_cap"]);

	header("Location: /painel/my-books");
	exit;

}); 

$app->get('/painel/my-books/:book_id/capitulos', function($book_id){

	User::verifyLogin();
	$user = User::userSession();
	$book = Book::book($book_id, $user['id']);
	$chapters = Book::chapters($book_id, $user['id']);


	
	$page = new PageAdmin();

	if(count($chapters) > 0){	
		$page->setTpl("chapters", array(
			"user"=>$user,
			"chapters"=>$chapters
		));
	}else{
		$page->setTpl("add-cap", array(
			"user"=>$user,
			"book"=>$book
		));
	}

	
});

$app->get('/painel/my-books/:book_id/:chapter_id/add_page', function($book_id, $chapter_id){

	User::verifyLogin();
	$user = User::userSession();
	$book = Book::chapter($chapter_id, $user['id']);

	$page = new PageAdmin();

	$page->setTpl("add_page", array(
		"user"=>$user,
		"book"=>$book
	));

});

$app->run();

?>