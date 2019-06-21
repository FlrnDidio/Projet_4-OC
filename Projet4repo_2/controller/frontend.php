<?php


require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/InscriptionManager.php');

function listPosts()
{
	$postManager = new \Florian\Projet4\Model\PostManager();
	$posts = $postManager->getPosts();

	require('view/frontend/listPostsView.php'); 
}

function post()
{
	$postManager = new \Florian\Projet4\Model\PostManager();
	$commentManager = new \Florian\Projet4\Model\CommentManager();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);

	require('view/frontend/postView.php');
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

function showSignIn()
{
	require('view/frontend/InscriptionView.php');
}

function getSignIn($email, $pseudo, $pass_2)
{
	$emailVerified = filter_var($email, FILTER_VALIDATE_EMAIL);
	$hachedPass = password_hash($pass_2, PASSWORD_DEFAULT);

	$inscriptionManager = new \Florian\Projet4\Model\InscriptionManager();

	$availability = $inscriptionManager->isPseudoAvailable($pseudo);

	if($availability) {
		$inscription = $inscriptionManager->signIn($emailVerified, $pseudo, $hachedPass);

	}
	else {
		echo 'Ce pseudo est déjà pris';
	}


	if($inscription) {
		echo 'Vous êtes dorénavant inscrit';
		header('Location: index.php?action=listPosts');

	}
	else {
		echo 'inscription échouée';
	}
	


}