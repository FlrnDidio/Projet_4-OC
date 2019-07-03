<?php

namespace Florian\Projet4\Model; 

require_once('model/Manager.php');

class MailManager extends Manager
{
	public function mailToAdmin($email, $messagearea)
	{
		$headers = 'From' . $email . "\r\n";

		$mail = mail('didio.flo@gmail.com', 'Contact', $messagearea, $headers);

		return $mail;

	}
}