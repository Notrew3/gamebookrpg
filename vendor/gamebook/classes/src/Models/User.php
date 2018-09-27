<?php

namespace Game\Models;

use \Game\DB\Sql;
use \Game\Model;

class User extends Model
{

	const SESSION = "User";

	public static function login($login, $password)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM user WHERE login = :LOGIN", array(
			":LOGIN"=>$login
		));

		if(count($results) === 0)
		{
			throw new \Exception("Usuário ou senha inválida");			
		}

		$data = $results[0];

		if(password_verify($password, $data["password"]) === true)
		{
			$user = new User();

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		}else{

			throw new \Exception("Usuário ou senha inválida");
		}
	}

	public static function verifyLogin()
	{
		if(
			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["id"] > 0
			
		){

			header("Location: /painel/login");
			exit;
		}
	}

	public static function isLogged()
	{
		if(isset($_SESSION[User::SESSION]))
		{
			header("Location: /painel");
			exit;
		}
	}

	public static function logout()
	{
		$_SESSION[User::SESSION] = NULL;
		
	}

	public static function userSession()
	{
		return $_SESSION[User::SESSION];
	}
}

?>