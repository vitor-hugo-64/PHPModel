<?php

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

$app->run();