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
		$resultat = $req->fetch();

		$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

		if(!$resultat){
			echo 'Mauvais identifiant ou mot de passe!';
		}
		else {
			if($isPasswordCorrect) {
				session_start();
				$_SESSION['id'] = $resultat['id'];
				$_SESSION['pseudo'] = $pseudo;
				echo $_SESSION['pseudo'];
				echo $_SESSION['id'];
				showAdmin();
			}
			else {
				echo 'Mauvais identifiant ou mot de passe!';
			}
		}
	}
	public function publicLogin($pseudo, $pass) 
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM members WHERE pseudo = ?');
		$req->execute(array($pseudo));
		$resultat = $req->fetch();

		$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

		if(!$resultat){
			echo 'Mauvais identifiant ou mot de passe!';
			
		}
		else {
			if($isPasswordCorrect) {
				session_start();
				$_SESSION['id'] = $resultat['id'];
				$_SESSION['pseudo'] = $pseudo;
				echo $_SESSION['pseudo'];
				echo $_SESSION['id'];

			}
			else {
				echo 'Mauvais identifiant ou mot de passe!';
			}
		}
	}
}