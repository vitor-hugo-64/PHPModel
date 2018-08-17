<?php

namespace PHPModel\Model;

use \Exception;
use \PHPModel\Model;
use \Medoo\Medoo;

class User extends Model
{
	private $DB;

	const TABLE_NAME = 'pm_user';
	const STATUS_MESSAGE = 'MESSAGE';
	const STATUS_TYPE = 'TYPE';

	function __construct()
	{
		$parameters = array( 
			'database_type' => 'mysql', 
			'database_name' => 'phpmodel' , 
			'server' => 'localhost' ,  
			'username' => 'root' ,  
			'password' => '',
			'charset' => 'utf8'
		);

		$this->DB = new Medoo( $parameters);
	}

	public static function setStatus( $message, $type)
	{
		$_SESSION[ User::STATUS_MESSAGE ] = $message;
		$_SESSION[ User::STATUS_TYPE ] = $type;
	}

	public static function cleanStatus()
	{
		$_SESSION[ User::STATUS_MESSAGE ] = null;
		$_SESSION[ User::STATUS_TYPE ] = null;
	}

	public static function getStatus():array
	{
		$status = array( 
			'message' => $_SESSION[ User::STATUS_MESSAGE ], 
			'type' => $_SESSION[ User::STATUS_TYPE ]
		);

		User::cleanStatus();
		return $status;
	}

	private function userExists()
	{
		$columns = array( 'cpf');
		$where = array( 'cpf[=]' => $this->getCpf());
		$response = $this->DB->select( User::TABLE_NAME, $columns, $where);

		if ( count( $response) > 0) {
			throw new Exception("Erro! CPF já está cadastrado!", 1);
		}
	}

	private function insert()
	{
		$this->userExists();

		$columns = array( 
			'first_name' => $this->getFirstName(),
			'last_name' => $this->getLastName(),
			'sex' => $this->getSex(),
			'cpf' => $this->getCpf()
		);

		$this->DB->insert( User::TABLE_NAME, $columns);
	}

	private function update()
	{
		$columns = array( 
			'first_name' => $this->getFirstName(),
			'last_name' => $this->getLastName(),
			'sex' => $this->getSex(),
			'cpf' => $this->getCpf()
		);

		$where = array( 'user_id' => $this->getUserId());
		$this->DB->update( User::TABLE_NAME, $columns, $where);
	}

	public function save()
	{
		if ( $this->getUserId() == null) {
			$this->insert();
		} else {
			$this->update();
		}
	}

	public static function delete( $userId)
	{
		$parameters = array( 
			'database_type' => 'mysql', 
			'database_name' => 'phpmodel' , 
			'server' => 'localhost' ,  
			'username' => 'root' ,  
			'password' => '',
			'charset' => 'utf8'
		);

		$DB = new Medoo( $parameters);
		$where = array( 'user_id' => $userId);
		$DB->delete( User::TABLE_NAME, $where);
	}

	public static function getDatasById( $userId)
	{
		$parameters = array( 
			'database_type' => 'mysql', 
			'database_name' => 'phpmodel' , 
			'server' => 'localhost' ,  
			'username' => 'root' ,  
			'password' => '',
			'charset' => 'utf8'
		);

		$DB = new Medoo( $parameters);
		$columns = array( 'user_id', 'first_name', 'last_name', 'sex', 'cpf');
		$where = array( 'user_id' => $userId);
		$response = $DB->select( User::TABLE_NAME, $columns, $where);
		return $response[0];
	}

	public static function listAll($value='')
	{
		$parameters = array( 
			'database_type' => 'mysql', 
			'database_name' => 'phpmodel' , 
			'server' => 'localhost' ,  
			'username' => 'root' ,  
			'password' => '',
			'charset' => 'utf8'
		);

		$DB = new Medoo( $parameters);
		$columns = array( 'user_id', 'first_name', 'last_name', 'sex', 'cpf');
		return $DB->select( User::TABLE_NAME, $columns);
	}
}