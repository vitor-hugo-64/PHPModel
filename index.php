<?php

session_start();

require_once('vendor/autoload.php');

use \Slim\App;
use \PHPModel\Page;

$config = array( 'settings' => array( 'addContentLengthHeader' => false), 'debug' => true);

$app = new App($config);

$app->get( '/', function ()
{
	$page = new Page();
	$page->drawPage( 'index');
});

require_once('user.php');
require_once('email.php');
require_once('courier.php');

$app->run();