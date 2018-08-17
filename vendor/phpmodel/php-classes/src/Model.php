<?php 

namespace PHPModel;

class Model {

	private $values = [];

	public function __call($name, $args)
	{
		$method = substr($name, 0, 3);
		$fieldName = substr($name, 3, strlen($name));
		$width = strlen( $fieldName);
		$i = 0;

		while ( $i < $width) {

			$character = $fieldName[ $i];

			if ( ctype_upper( $character)) {
				$newCharacter = ( $i == 0) ? strtolower( $character) : '_' . strtolower( $character);
				$fieldName = str_replace( $fieldName[ $i], $newCharacter, $fieldName);
			}

			$i++;

		}

		switch ($method)
		{
			case "get":
			return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL;
			break;
			case "set":
			$this->values[$fieldName] = $args[0];
			break;
		}

	}

	public function setDatas($data = array())
	{
		foreach ($data as $key => $value) {	
			$this->{"set".$key}($value);
		}
	}

	public function getDatas()
	{
		return $this->values;
	}

}

?>