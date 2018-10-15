<?php

namespace Game\Models;

use \Game\DB\Sql;
use \Game\Model;

class Book extends Model
{

	public static function allCategories()
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM categorias");

		return $results;
	}

	public static function insertBook($nome, $id_categoria, $id_user)
	{
		$sql = new Sql();

		$last = $sql->query("INSERT INTO livros (nome_livro, id_categoria, user_id) VALUES(:NOME, :ID_CATEGORIA, :ID_USER)", "insert", array(
			":NOME"=>$nome,
			":ID_CATEGORIA"=>$id_categoria,
			":ID_USER"=>$id_user
		));

		return $last;
	}

	public static function myBooks($user_id)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT livros.id, livros.nome_livro, categorias.nome_categoria FROM livros  JOIN categorias  ON livros.id_categoria = categorias.id  WHERE livros.user_id = :USER_ID", array(
				":USER_ID"=>$user_id
			));

		return $results;
	}

	public static function book($book_id, $user_id){

		$sql = new Sql();

		$result = $sql->select("SELECT livros.id, livros.nome_livro, livros.user_id, categorias.nome_categoria FROM livros  JOIN categorias  ON livros.id_categoria = categorias.id  WHERE livros.id = :BOOK_ID", array(
				":BOOK_ID"=>$book_id
		    ));
		if($result[0]['user_id'] != $user_id){
			header("Location: /painel/my-books");
			exit;
		}else{
		return $result;
	}
	}

	public static function insertChapter($id_book, $titulo, $sub_titulo)
	{

		$sql = new Sql();

		$last = $sql->query("INSERT INTO capitulos (id_livro, titulo, sub_titulo) VALUES(:ID_LIVRO, :TITULO, :SUB_TITULO)", "insert", array(
			":ID_LIVRO"=>$id_book,
			":TITULO"=>$titulo,
			":SUB_TITULO"=>$sub_titulo
		));

		return $last;
	}

	public static function chapters($book_id, $user_id){

		$sql = new Sql();

		$results = $sql->select("SELECT capitulos.id, capitulos.id_livro, capitulos.titulo,
		capitulos.sub_titulo, capitulos.texto, livros.nome_livro, livros.sub_nome, livros.id_categoria, livros.user_id FROM capitulos  JOIN livros  ON capitulos.id_livro = livros.id  WHERE capitulos.id_livro = :BOOK_ID", array(
				":BOOK_ID"=>$book_id
		    ));
		$results_filter = array();

		for($i = 0; $i < count($results); $i++){

			if($results[$i]['user_id'] == $user_id){
				array_push($results_filter, $results[$i]);
			}
		}
		
			return $results_filter;
	}

	public static function chapter($chapter_id, $user_id){

		$sql = new Sql();

		$result = $sql->select("SELECT capitulos.id, capitulos.id_livro, capitulos.titulo,
		capitulos.sub_titulo, capitulos.texto, livros.nome_livro, livros.sub_nome, livros.id_categoria, livros.user_id FROM capitulos  JOIN livros  ON capitulos.id_livro = livros.id  WHERE capitulos.id = :BOOK_ID", array(
				":BOOK_ID"=>$chapter_id
		    ));
		
			if($result[0]['user_id'] == $user_id){
				return $result;
			}	
			
	}
}

?>