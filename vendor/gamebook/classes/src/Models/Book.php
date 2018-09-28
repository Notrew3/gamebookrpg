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

	public static function insertBook($nome, $id_categoria)
	{
		$sql = new Sql();

		$sql->query("INSERT INTO livros (nome, id_categoria) VALUES(:NOME, :ID_CATEGORIA)", array(
			":NOME"=>$nome,
			":ID_CATEGORIA"=>$id_categoria
		));
	}
}

?>