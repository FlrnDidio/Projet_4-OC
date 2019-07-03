<?php 

namespace Florian\Projet4\Model; 

require_once('model/Manager.php');

class CommentManager extends Manager
{
	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? AND publishable = 1 ORDER BY comment_date DESC');
		$comments->execute(array($postId));

		return $comments;
	}

	public function getAllComments()
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE publishable = 0 ORDER BY comment_date DESC ');
		$comments->execute(array());

		return $comments;
	}

	public function getOtherComments($postId)
	{
		$db = $this->dbConnect();
		$modComments = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? AND publishable = 0 ORDER BY comment_date DESC');
		$modComments->execute(array($postId));

		return $modComments;
	}

	public function postComment($postId, $author, $comment)
	{
		$db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, publishable) VALUES(?, ?, ?, NOW(), 1)');
        $affectedLines = $comments->execute(array($postId, $author, htmlspecialchars($comment)));

        return $affectedLines;
	}

	public function moderateComment($modCommentid, $publishComment)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET publishable = ? WHERE id = ?');
		$affectedLines =  $req->execute(array(strip_tags($publishComment), $modCommentid));

		return $affectedLines;
	}

	public function deleteComment($modCommentid, $publishComment)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE id = ? AND publishable = ?');
		$affectedLines = $req->execute(array($modCommentid, $publishComment));

		return $affectedLines;
	}
	public function reportComment($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET publishable = 0 WHERE id = ?');
		$affectedLines = $req->execute(array($id));

		return $affectedLines;
	}

}