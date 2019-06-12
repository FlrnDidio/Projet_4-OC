<?php

namespace Florian\Projet4\Model; 

require_once('model/Manager.php');

class ConnexionManager extends Manager
{
	public function login($pseudo, $pass)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, pass FROM members WHERE pseudo = :pseudo');
		$req->execute(array(
			'pseudo' => $pseudo));
		$resultat = $req->fetch();

		$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

		if(!$resultat)
		{
			echo 'Mauvais identifiant ou mot de passe!';
		}
		else
		{
			if($isPasswordCorrect) {
				session_start();
				$_SESSION['id'] = $resultat['id'];
				$_SESSION['pseudo'] = $pseudo;
				echo 'Bienvenue ';
			}
			else {
				echo 'Mauvais identifiant ou mot de passe!';
			}
		}
	}
}