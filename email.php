<?php

use \PHPModel\Page;
use \PHPModel\Mailer;

$app->get( '/email', function ()
{
	$parameters = array( 'status' => Mailer::getStatus());
	$page = new Page();
	$page->drawPage( 'email', $parameters);
});

$app->get( '/email/send', function ()
{
	$page = new Page();
	$page->drawPage( 'email-send');
});

$app->post( '/email/send', function ()
{
	$mailer = new Mailer( $_POST['sender_email'], $_POST['sender_name']);
	$recipients = array( 'Vitor Hugo' => $_POST['recipient_email']);
	$altBody = 'Erro no corpo do email!';
	$mailer->setInformations( $_POST['subject'], $_POST['body_text'], $altBody,$recipients);
	$attachments = array( 'document' => $_FILES['attachment']['tmp_name']);
	$mailer->setAttachments( $_FILES['attachment']);

	try {
		$mailer->send();
		Mailer::setStatus( 'Email enviado com sucesso!', 'success');
	} catch (Exception $e) {
		Mailer::setStatus( $e->getMessage(), 'danger');
	}

	header('Location: /email');
	exit();

});