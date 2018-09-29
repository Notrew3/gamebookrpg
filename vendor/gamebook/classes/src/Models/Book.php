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
}

?>