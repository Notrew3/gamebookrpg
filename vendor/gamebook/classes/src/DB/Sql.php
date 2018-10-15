<?php 

namespace Game\DB;

/**
*@author Ewerton Azevedo
*@package DB
*@version 1.0
*/

class Sql {


	const HOSTNAME = "127.0.0.1";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "gamebook";

	private $conn;

	/**
	* Método construtor
	* @access public
	* @return void
	*/

	public function __construct()
	{

		$this->conn = new \PDO(
			"mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME, 
			Sql::USERNAME,
			Sql::PASSWORD
		);

	}

	/**
	* Método que faz todos os bindsParams da Query
	* @access private
	* @param $statement Variável recebe a query SQL
	* @param $parameters Array com todos as referências e valores dos binds
	* @return void
	*/

	private function setParams($statement, $parameters = array())
	{
		
		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);


		}



	}

	

	private function bindParam($statement, $key, $value)
	{

		$statement->bindParam($key, $value);


	}

	public function query($rawQuery, $queryType = "", $params = array())
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		if($queryType == "insert")
		{
			$stmt->execute();
			return $this->conn->lastInsertId();
		} else 
		{
		$stmt->execute();
		}

	}

	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}

}

 ?>