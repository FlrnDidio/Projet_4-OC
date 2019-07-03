<?php

namespace Florian\Projet4\Model; 

require_once('model/Manager.php');

class PostManager extends Manager
{
	public function getPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, publishable, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE publishable = 1 ORDER BY creation_date DESC LIMIT 0, 5');

		return $req;
	}

	public function getAlmostPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE publishable = 0 ORDER BY creation_date DESC LIMIT 0, 5');

		return $req;
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, publishable FROM posts WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	public function writePost($posttitle, $postcontent)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO posts(title, content, creation_date, publishable) VALUES(?, ?, ?, 1)');
		$req->execute(array($posttitle, strip_tags(nl2br(html_entity_decode($postcontent))), date('Y-m-d H:i:s')));

		echo 'Le chapitre a bien été ajouté dans la catégorie: Publié';

		return $req;
	}

	public function writeLaterPost($posttitle, $postcontent)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO posts(title, content, creation_date, publishable) VALUES(?, ?, ?, 0)');
		$req->execute(array($posttitle, strip_tags(nl2br(html_entity_decode($postcontent))), date('Y-m-d H:i:s')));

		echo 'Le chapitre a bien été ajouté dans la catégorie: Non-publié';

		return $req;
	}

	public function updatePost($postId, $posttitle, $updatecontent, $publish)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE posts SET title = ?, content = ?, publishable = ? WHERE id = ?');
		$affectedLines = $req->execute(array($posttitle, htmlspecialchars(nl2br(html_entity_decode($updatecontent))), $publish, $postId));

		return $affectedLines;
	}

	public function DeleteThisPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM posts WHERE id = ?');
		$post = $req->execute(array($postId));
	}	
}

