<?php

use \PHPModel\Page;
use \PHPModel\ViaCEP;

$app->get( '/cep', function ()
{
	$parameters = array( 'status' => ViaCEP::getStatus());
	$page = new Page();
	$page->drawPage( 'cep', $parameters);
});

$app->post( '/cep/get', function ()
{
	$viaCEP = new ViaCEP();
	$viaCEP->setZipCode( $_POST['zip_code']);

	try {
		$viaCEP->getInformationsByZipCode( 'xml');
	} catch (Exception $e) {

		ViaCEP::setStatus( $e->getMessage(), 'danger');
		header('Location: /cep');
		exit();

	}

	echo json_encode( $viaCEP->getDatas());	
});