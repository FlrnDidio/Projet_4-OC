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

	$isPasswordCorrect = password_verify($_POST['pass'], $log['pass']);

	if(!$log){
		echo 'Mauvais identifiant ou mot de passe!';
		require('view/backend/errorView.php');
	}
	else {
		if($isPasswordCorrect) {
			//session_start();
			$_SESSION['id'] = $log['id'];
			$_SESSION['pseudo'] = $pseudo;
			echo $_SESSION['pseudo'];
			echo $_SESSION['id'];
			showAdmin();
		}
		else {
			echo 'Mauvais identifiant ou mot de passe!';
			require('view/backend/errorView.php');
		}
	}
}

function showAdmin()
{
	$postManager = new \Florian\Projet4\Model\PostManager();
	$posts = $postManager->getPosts();
	$almostposts = $postManager->getAlmostPosts();

	require('view/backend/adminView.php');
}

function addPost($posttitle, $postcontent)
{
	$postManager = new \Florian\Projet4\Model\PostManager();
	$newPost = $postManager->writePost($posttitle, $postcontent);

	if($newPost) {
		showAdmin();

	}
}

function addLaterPost($posttitle, $postcontent)
{
	$postManager = new \Florian\Projet4\Model\PostManager();
	$newLaterPost = $postManager->writeLaterPost($posttitle, $postcontent);

	if($newLaterPost) {
		showAdmin();
	}
}

function showUpdatePost()
{
	$postManager = new \Florian\Projet4\Model\PostManager();
	$post = $postManager->getPost($_GET['id']);
	echo $_GET['id'] . '-';
	echo $post['publishable'];


	require('view/backend/updateView.php');
}

function update($postId, $posttitle, $updatecontent, $publish)
{
	if($publish === 'oui') {
		$publish = '1';
	}
	if($publish === 'non') {
		$publish = '0';
	}

	$postManager = new \Florian\Projet4\Model\PostManager();
	$affectedLines = $postManager->updatePost($postId, $posttitle, $updatecontent, $publish);

	if ($affectedLines === false) {
		echo $postId, $posttitle, $updatecontent, $publish;
		throw new Exception('Impossible de modifier le chapitre !');
	}
	else {
		header('Location: index.php?action=showAdmin');
	}
}

function deletePost($postId) 
{
	$postManager = new \Florian\Projet4\Model\PostManager();
	$post = $postManager->DeleteThisPost($postId);

	if($post === false) {
		throw new Exception('Impossible de supprimer le chapitre');
	}
	else {
		header('Location: index.php?action=showAdmin');
	}
}
function showAdminComments($postId)
{
	$postManager = new \Florian\Projet4\Model\PostManager();
	$commentManager = new \Florian\Projet4\Model\CommentManager();

	$post = $postManager->getPost($postId);
	$comments = $commentManager->getComments($postId);
	$modComments = $commentManager->getOtherComments($postId);

	require('view/backend/adminCommentsView.php');
}

function moderateAdminComments($modCommentid, $publishComment)
{

	if($publishComment == 'oui') {
		$publishComment = '1';
		filter_var($publishComment) ;
	}
	if($publishComment == 'non') {
		$publishComment = '0';
		deleteAdminComments($modCommentid, $publishComment);
	}

	$commentManager = new \Florian\Projet4\Model\CommentManager();
	$affectedLines = $commentManager->moderateComment($modCommentid, $publishComment);

	if($affectedLines === false) {
		filter_var($publishComment);
		throw new Exception('Impossible de modérer le commentaire');
	}
	else {
		header('Location: index.php?action=showAllComments');
	}
}

function deleteAdminComments($modCommentid, $publishComment)
{
	$commentManager = new \Florian\Projet4\Model\CommentManager();
	$affectedLines = $commentManager->deleteComment($modCommentid, $publishComment);

	if($affectedLines === false) {
		throw new Exception('Impossible de supprimer le commentaire');

	}
	else {
		header('Location: index.php?action=showAdmin');
	}
}

function showAllComments()
{
	$commentManager = new \Florian\Projet4\Model\CommentManager();
	$comments = $commentManager->getAllComments();

	require('view/backend/adminAllCommentsView.php');
}