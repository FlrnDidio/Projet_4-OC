<?php


require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
	$postManager = new \Florian\Projet4\Model\PostManager();
	$posts = $postManager->getPosts();

	require('view/frontend/listPostsView.php'); //AJOUT LIEN VUE!
}

function post()
{
	$postManager = new \Florian\Projet4\Model\PostManager();
	$commentManager = new \Florian\Projet4\Model\CommentManager();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);

	require('view/frontend/postView.php'); //AJOUT LIEN VUE!
}

function addComment($postId, $author, $comment)
{
	$commentManager = new \Florian\Projet4\Model\CommentManager();

	$affectedLines = $commentManager->postComment($postId, $author, $comment);

	if($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter le commentaire !');
	}
	else {
		header('Location: index.php?action=post&id=' . $postId);
	}
}

function showContact()
{
	require('view/frontend/contactFormView.php');
}