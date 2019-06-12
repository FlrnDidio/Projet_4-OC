<?php

namespace Florian\Projet4\Model; 

require_once('model/Manager.php');

class PostManager extends Manager
{
	public function getPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

		return $req;
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	public function writePost($title, $content)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT posts(title, content)');
		$req = $db->prepare('INSERT INTO posts(title, content) VALUES(:title, :content )');
		$req->execute(array($title, $content));

		echo 'Le post a bien été ajouté';

		if(isset($title) && isset($content)) {
			echo 'les champs sont vides';
		}

		if(empty($title) && empty($content)) {
			echo 'tous les champs ne sont pas renseignés';
		}

	}	
}

