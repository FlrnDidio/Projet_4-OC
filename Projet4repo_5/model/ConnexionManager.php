<?php

namespace Florian\Projet4\Model; 

require_once('model/Manager.php');

class ConnexionManager extends Manager
{
	public function login($pseudo, $pass)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM admin_members WHERE pseudo = ?');
		$req->execute(array($pseudo));
		$log = $req->fetch();

		return $log;
	}
	
	public function publicLogin($pseudo, $pass) 
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM members WHERE pseudo = ?');
		$req->execute(array($pseudo));
		$log = $req->fetch();

		return $log;
	}
}