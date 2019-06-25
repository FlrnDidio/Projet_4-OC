<?php

namespace Florian\Projet4\Model; 

require_once('model/Manager.php');

class InscriptionManager extends Manager
{
	public function signIn($pseudo, $hachedPass, $emailVerified)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO members(pseudo, pass, email, inscription_date) VALUES(?, ?, ?, NOW() )');
		$inscription = $req->execute(array($pseudo, $hachedPass, $emailVerified));

		return $inscription;
	}

	public function isPseudoAvailable($pseudo)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT pseudo FROM members WHERE pseudo = ?');
		$req->execute(array($pseudo));
		$user = $req->fetch();

		if(empty($user)) {
			$availability = true;
		}
		else {
			$availability = false;
		}

		return $availability;
	}




}