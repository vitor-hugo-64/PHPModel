<?php

namespace PHPModel;

use \PHPModel\Model;

class Courier extends Model
{
	private $datas;

	const STATUS_MESSAGE = 'MESSAGE';
	const STATUS_TYPE = 'TYPE';

	public static function setStatus( $message, $type)
	{
		$_SESSION[ Courier::STATUS_MESSAGE ] = $message;
		$_SESSION[ Courier::STATUS_TYPE ] = $type;
	}

	public static function cleanStatus()
	{
		$_SESSION[ Courier::STATUS_MESSAGE ] = null;
		$_SESSION[ Courier::STATUS_TYPE ] = null;
	}

	public static function getStatus():array
	{
		$status = array( 
			'message' => $_SESSION[ Courier::STATUS_MESSAGE ], 
			'type' => $_SESSION[ Courier::STATUS_TYPE ]
		);

		Courier::cleanStatus();
		return $status;
	}

	private function checkMessageError( $errorCode)
	{
		
		if ( $errorCode != '0') {

			$errorMessage = '';

			if ( $errorCode == '-1') $errorMessage = 'Código de serviço inválido.';
			if ( $errorCode == '-2') $errorMessage = 'CEP de origem inválido.';
			if ( $errorCode == '-3') $errorMessage = 'CEP de destino inválido.';
			if ( $errorCode == '-4') $errorMessage = 'Peso excedido.';			
			if ( $errorCode == '-5') $errorMessage = 'O Valor Declarado não deve exceder R$ 10.000,00.';
			if ( $errorCode == '-6') $errorMessage = 'Serviço indisponível para o trecho informado.';
			if ( $errorCode == '-7') $errorMessage = 'O Valor Declarado é obrigatório para este serviço.';
			if ( $errorCode == '-8') $errorMessage = 'Este serviço não aceita Mão Própria.';
			if ( $errorCode == '-9') $errorMessage = 'Este serviço não aceita Aviso de Recebimento.';
			if ( $errorCode == '-10') $errorMessage = 'Precificação indisponível para o trecho informado.';
			if ( $errorCode == '-11') $errorMessage = 'Para definição do preço deverão ser informados, também, o comprimento, a largura e altura do objeto em centímetros (cm).';
			if ( $errorCode == '-12') $errorMessage = 'Comprimento inválido.';
			if ( $errorCode == '-13') $errorMessage = 'Largura inválida.';
			if ( $errorCode == '-14') $errorMessage = 'Altura inválida.';
			if ( $errorCode == '-15') $errorMessage = 'O comprimento não pode ser maior que 105 cm.';
			if ( $errorCode == '-16') $errorMessage = 'A largura não pode ser maior que 105 cm.';
			if ( $errorCode == '-17') $errorMessage = 'A altura não pode ser maior que 105 cm.';
			if ( $errorCode == '-18') $errorMessage = 'A altura não pode ser inferior a 2 cm.';
			if ( $errorCode == '-20') $errorMessage = 'A largura não pode ser inferior a 11 cm';
			if ( $errorCode == '-22') $errorMessage = 'CEP de origem inválido';
			if ( $errorCode == '-22') $errorMessage = 'O comprimento não pode ser inferior a 16 cm.';
			if ( $errorCode == '-23') $errorMessage = 'A soma resultante do comprimento + largura + altura não deve superar a 200 cm.';
			if ( $errorCode == '-24') $errorMessage = 'Comprimento inválido.';
			if ( $errorCode == '-25') $errorMessage = 'Diâmetro inválido';
			if ( $errorCode == '-26') $errorMessage = 'Informe o comprimento';
			if ( $errorCode == '-27') $errorMessage = 'Informe o diâmetro.';
			if ( $errorCode == '-28') $errorMessage = 'O comprimento não pode ser maior que 105 cm.';
			if ( $errorCode == '-29') $errorMessage = 'O diâmetro não pode ser maior que 91 cm.';
			if ( $errorCode == '-30') $errorMessage = 'O comprimento não pode ser inferior a 18 cm.';
			if ( $errorCode == '-31') $errorMessage = 'O diâmetro não pode ser inferior a 5 cm.';
			if ( $errorCode == '-32') $errorMessage = 'A soma resultante do comprimento + o dobro do diâmetro não deve superar a 200 cm.';
			if ( $errorCode == '-33') $errorMessage = 'Sistema temporariamente fora do ar. Favor tentar mais tarde.';
			if ( $errorCode == '-34') $errorMessage = 'Código Administrativo ou Senha inválidos.';
			if ( $errorCode == '-35') $errorMessage = 'Senha incorreta.';
			if ( $errorCode == '-36') $errorMessage = 'Cliente não possui contrato vigente com os Correios.';
			if ( $errorCode == '-37') $errorMessage = 'Cliente não possui serviço ativo em seu contrato.';
			if ( $errorCode == '-38') $errorMessage = 'Serviço indisponível para este código administrativo.';
			if ( $errorCode == '-39') $errorMessage = 'Peso excedido para o formato envelope';
			if ( $errorCode == '-40') $errorMessage = 'Para definicao do preco deverao ser informados, tambem, o comprimento e a largura e altura do objeto em centimetros (cm).';
			if ( $errorCode == '-41') $errorMessage = 'O comprimento nao pode ser maior que 60 cm.';
			if ( $errorCode == '-42') $errorMessage = 'O comprimento nao pode ser inferior a 16 cm. ';
			if ( $errorCode == '-43') $errorMessage = 'A soma resultante do comprimento + largura nao deve superar a 120 cm.';
			if ( $errorCode == '-44') $errorMessage = 'A largura nao pode ser inferior a 11 cm.';
			if ( $errorCode == '-45') $errorMessage = 'A largura nao pode ser maior que 60 cm.';
			if ( $errorCode == '-888') $errorMessage = 'Erro ao calcular a tarifa.';
			if ( $errorCode == '-006') $errorMessage = 'Localidade de origem não abrange o serviço informado.';
			if ( $errorCode == '-007') $errorMessage = 'Localidade de destino não abrange o serviço informado.';
			if ( $errorCode == '-008') $errorMessage = 'Serviço indisponível para o trecho informado.';
			if ( $errorCode == '-009') $errorMessage = 'CEP inicial pertencente a Área de Risco.';
			if ( $errorCode == '-010') $errorMessage = 'Área com entrega temporariamente sujeita a prazo diferenciado.';
			if ( $errorCode == '-011') $errorMessage = 'CEP inicial e final pertencentes a Área de Risco.';
			if ( $errorCode == '-7') $errorMessage = 'Serviço indisponível, tente mais tarde.';
			if ( $errorCode == '-9') $errorMessage = 'Outros erros diversos do .Net.';

			throw new \Exception( $errorMessage, 1);
			
		}
	}

	public function calculatePriceAndTerm()
	{

		$url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=ZIP_CODE_ORIGIN&sCepDestino=ZIP_CODE_DESTINY"
		. "&nVlPeso=WEIGHT&nCdFormato=FORMAT&nVlComprimento=LENGTH&nVlAltura=HEIGHT&nVlLargura=WIDTH&sCdMaoPropria=OWN_HAND&nVlValorDeclarado=DECLARED_VALUE"
		. "&sCdAvisoRecebimento=NOTICE_OF_RECEIPT&nCdServico=SERVICE_CODE&nVlDiametro=DIAMETER&StrRetorno=RETURN_TYPE&nIndicaCalculo=INDICATE_CALCULATION";

		$url = str_replace( 'ZIP_CODE_ORIGIN', (string)$this->getOriginZipCode(), $url);
		$url = str_replace( 'ZIP_CODE_DESTINY', (string)$this->getDestinationZipCode(), $url);
		$url = str_replace( 'WEIGHT', (string)$this->getWeight(), $url);
		$url = str_replace( 'FORMAT', '1', $url);
		$url = str_replace( 'LENGTH', (string)$this->getLength(), $url);
		$url = str_replace( 'HEIGHT', (string)$this->getHeight(), $url);
		$url = str_replace( 'WIDTH', (string)$this->getWidth(), $url);
		$url = str_replace( 'OWN_HAND', 'N', $url);
		$url = str_replace( 'DECLARED_VALUE', '0', $url);
		$url = str_replace( 'NOTICE_OF_RECEIPT', 'N', $url);
		$url = str_replace( 'SERVICE_CODE', (string)$this->getServiceCode(), $url);
		$url = str_replace( 'DIAMETER', (string)$this->getDiameter(), $url);
		$url = str_replace( 'RETURN_TYPE', 'xml', $url);
		$url = str_replace( 'INDICATE_CALCULATION', '3', $url);

		$this->datas = simplexml_load_string( file_get_contents( $url));

		$this->checkMessageError( $this->datas->cServico->Erro);

		return $this->datas->cServico;
	}


}