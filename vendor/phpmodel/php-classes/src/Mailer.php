<?php

namespace PHPModel;

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;
use \Rain\Tpl;

class Mailer
{
	private $mail;

	const STATUS_MESSAGE = 'MESSAGE';
	const STATUS_TYPE = 'TYPE';

	function __construct( $senderEmail, $senderName)
	{
		$this->mail = new PHPMailer(true);

		$this->mail->SMTPDebug = 2;
		$this->mail->isSMTP();
		$this->mail->Host = 'smtp.gmail.com';
		$this->mail->SMTPAuth = true;
		$this->mail->Username = 'vitorhugooliveira64@gmail.com';
		$this->mail->Password = '915157096141270vho';
		$this->mail->SMTPSecure = 'tls';
		$this->mail->Port = 587;
		$this->mail->CharSet = 'utf-8';

		$this->mail->setFrom( $senderEmail, $senderName);
	}

	public static function setStatus( $message, $type)
	{
		$_SESSION[ Mailer::STATUS_MESSAGE ] = $message;
		$_SESSION[ Mailer::STATUS_TYPE ] = $type;
	}

	public static function cleanStatus()
	{
		$_SESSION[ Mailer::STATUS_MESSAGE ] = null;
		$_SESSION[ Mailer::STATUS_TYPE ] = null;
	}

	public static function getStatus():array
	{
		$status = array( 
			'message' => $_SESSION[ Mailer::STATUS_MESSAGE ], 
			'type' => $_SESSION[ Mailer::STATUS_TYPE ]
		);

		Mailer::cleanStatus();
		return $status;
	}

	public function setInformations( $subject, $bodyText = array(), $altBody, $recipients = array())
	{
		foreach ( $recipients as $key => $value) {
			$this->mail->addAddress( $value, $key);
		}

		$config = array(
			"tpl_dir"       => 'views/email/',
			"cache_dir"     => 'views-cache/',
			"debug"         => false
		);

		Tpl::configure( $config);
		$tpl = new Tpl();
		
		$tpl->assign( 'subject', $subject);
		$tpl->assign( 'body_text', $bodyText);

		$html = $tpl->draw( 'email-page', true);

		$this->mail->isHTML(true);
		$this->mail->Subject = $subject;
		$this->mail->Body    = $html;
		$this->mail->AltBody = $altBody;
	}

	public static function uploadFile( $file)
	{
		date_default_timezone_set("Brazil/East");

		$ext = strtolower( substr( $file['name'],-4));
		$newName = date("Y.m.d-H.i.s") . $ext;
		$dir = 'res/files/';

		move_uploaded_file( $file['tmp_name'], $dir.$newName);

		return $newName;
	}

	public function setAttachments( $file)
	{
		$fileName = Mailer::uploadFile( $file);
		$dir = 'res/files/';
		$this->mail->addAttachment( $dir . $fileName);
	}

	public function send()
	{
		$this->mail->send();
	}
}