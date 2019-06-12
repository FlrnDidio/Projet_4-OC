<?php 

require_once('model/ConnexionManager.php');


function showLog()
{
	require('view/backend/connexionView.php');
}

function getLog($pseudo, $pass)
{
	$connexionManager = new \Florian\Projet4\Model\ConnexionManager();
	$log = $connexionManager->login($pseudo, $pass);

	require('view/backend/adminView.php');
	return $log;
}

function showAdmin()
{
	require('view/backend/adminView.php');
}

function addPost($title, $content)
{
	echo 'Cette fonction est active';
	require('view/backend/adminView.php');
	$postManager = new \Florian\Projet4\Model\PostManager();

	$post = $postManager->writePost($title, $content);

	if($post === false) {
		throw new Exception('Impossible d\'ajouter l\'article!');
	}

	return $post;

}

