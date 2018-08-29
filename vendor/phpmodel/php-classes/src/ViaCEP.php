<?php

namespace PHPModel;

use \PHPModel\Model;

class ViaCEP extends Model
{
	private $url;

	const STATUS_MESSAGE = 'STATUS_MESSAGE';
	const STATUS_TYPE = 'STATUS_TYPE';
	
	function __construct()
	{
		$this->url = 'https://viacep.com.br/ws';
	}

	public static function setStatus( $message, $type)
	{
		$_SESSION[ ViaCEP::STATUS_MESSAGE ] = $message;
		$_SESSION[ ViaCEP::STATUS_TYPE ] = $type;
	}

	public static function cleanStatus()
	{
		$_SESSION[ ViaCEP::STATUS_MESSAGE ] = null;
		$_SESSION[ ViaCEP::STATUS_TYPE ] = null;
	}

	public static function getStatus():array
	{
		$status = array( 
			'message' => $_SESSION[ ViaCEP::STATUS_MESSAGE ], 
			'type' => $_SESSION[ ViaCEP::STATUS_TYPE ]
		);

		ViaCEP::cleanStatus();
		return $status;
	}

	public function getInformationsByZipCode( $returnType)
	{
		if ( strlen( $this->getZipCode()) > 8 || strlen( $this->getZipCode()) < 8 ) {
			throw new \Exception("Quantidade de caracteres incorretas para um CEP!", 1);
		}

		$query = $this->url . '/' . $this->getZipCode() . '/' . $returnType;
		$datas = simplexml_load_file( $query);
		$this->setDatas( $datas);
	}
}