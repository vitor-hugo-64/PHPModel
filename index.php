<?php

session_start();

require_once('vendor/autoload.php');

use \Slim\App;
use \PHPModel\Page;
use \PHPModel\Model\User;
use \Medoo\Medoo;

$config = array( 'settings' => array( 'addContentLengthHeader' => false), 'debug' => true);

$app = new App($config);

$app->get( '/', function ()
{
	$page = new Page();
	$page->drawPage( 'index');
});

$app->get( '/user', function ()
{
	$parameters = array( 
		'users' => User::listAll(), 
		'status' => User::getStatus()
	);

	$page = new Page();
	$page->drawPage( 'user', $parameters);
});

$app->get( '/user/insert', function ()
{
	$page = new Page();
	$parameters = array( 'status' => User::getStatus());
	$page->drawPage( 'user-insert', $parameters);
});

$app->post( '/user/insert', function ()
{
	$user = new User();
	$user->setDatas( $_POST);

	try {
		$user->save();
		User::setStatus( 'Sucesso! Usuário cadastrado com sucesso!', 'success');
	} catch ( Exception $e) {
		User::setStatus( $e->getMessage(), 'danger');
	}

	header('Location: /user');
	exit();
});

$app->get( '/user/update/{user_id}', function ( $request, $response, $args)
{
	$parameters = array(
		'user' => User::getDatasById( $args['user_id']),
		'status' => User::getStatus()
	);

	$page = new Page();
	$page->drawPage( 'user-update', $parameters);
});

$app->post( '/user/update', function ()
{
	$user = new User();
	$user->setDatas( $_POST);

	try {
		$user->save();
		User::setStatus( 'Sucesso! Usuário editado com sucesso!', 'success');
	} catch (Exception $e) {
		User::setStatus( $e->getMessage(), 'danger');
	}

	header('Location: /user');
	exit();
});

$app->get( '/user/delete/{user_id}', function ( $request, $response, $args)
{
	User::delete( $args['user_id']);
	User::setStatus( 'Sucesso! Usuário excluído com sucesso!', 'success');
	header('Location: /user');
	exit();
});

$app->run();