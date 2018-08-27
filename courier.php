<?php

use \PHPModel\Page;
use \PHPModel\Courier;

$app->get( '/courier', function ()
{
	$parameters = array( 'status' => Courier::getStatus());
	$page = new Page();
	$page->drawPage( 'courier', $parameters);
});

$app->post( '/courier/price-term-calculation', function ()
{
	$courier = new Courier();
	$courier->setDatas( $_POST);

	try {

		$datas = $courier->calculatePriceAndTerm();
		$calculationResult = (array) $datas;
		Courier::setStatus( 'Processamento com sucesso!', 'success');
		$parameters = array( 'status' => Courier::getStatus(), 'calculationResult' => $calculationResult, 'courier' => $courier->getDatas());
		$page = new Page();
		$page->drawPage( 'courier-result', $parameters);

	} catch (Exception $e) {

		Courier::setStatus( $e->getMessage(), 'danger');
		header('Location: /courier');	
		exit();

	}
});