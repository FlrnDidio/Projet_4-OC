<?php
require('controller/frontend.php');
require('controller/backend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();

        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();

            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');

            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);

                }
                else {                	
                    throw new Exception('Tous les champs ne sont pas remplis !');

                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');

            }
        }
        elseif ($_GET['action'] == 'showLog') {
            showLog();

        }
        elseif ($_GET['action'] == 'showContact') {
            showContact();

        }
        elseif($_GET['action'] == 'showAdmin') {
    		showAdmin();

        }
        elseif($_GET['action'] == 'showSignIn') {
            showSignIn();

        }
        elseif($_GET['action'] == 'getSignIn') {
            if(isset($_POST['email']) && isset($_POST['pseudo']) && isset($_POST['pass_1']) && isset($_POST['pass_2'])) {
                if($_POST['pass_1'] === $_POST['pass_2']) {
                    getSignIn($_POST['email'], $_POST['pseudo'] /*$_POST['pass_1']*/, $_POST['pass_2']);
                }
                else {
                    throw new Exception('La confirmation du mot de passe a échoué');
                }
            }
            else {
                throw new Exception('Veuillez remplir tous les champs');
            }
        }
    }
    else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'addPost') {  
            if (isset($_POST['posttitle']) && isset($_POST['postcontent']) && isset($_POST['publish'])) {
                if ($_POST['publish'] == 'no') {
                    addLaterPost($_POST['posttitle'], $_POST['postcontent']);

                } else {
                    addPost($_POST['posttitle'], $_POST['postcontent']);

                }   
            }
            else {
                throw new Exception ('Tous les champs ne sont pas remplis');
            }
        }
        elseif ($_GET['action'] == 'getLog') {
            if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
                getLog($_POST['pseudo'], $_POST['pass']);

            } else {

                throw new Exception('Erreur connexion');
            }
        }
        elseif ($_GET['action'] == 'showUpdatePost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {

                showUpdatePost();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'update') {
            if (isset($_GET['id'])) {
                if (isset($_POST['posttitle']) && isset($_POST['updatecontent']) && isset($_POST['publish'])) {

                    update($_GET['id'], $_POST['posttitle'], $_POST['updatecontent'], $_POST['publish']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                } 
            }else {
                throw new Exception('Pas d\'id selectionné');
            }
        }
        elseif ($_GET['action'] == 'delete') {
            if (isset($_GET['id'])) {

                deletePost($_GET['id']);
            }
        }
        elseif ($_GET['action'] == 'showAdminComments') {
            showAdminComments($_GET['id']);

        }
        elseif ($_GET['action'] == 'moderate') {
            if(isset($_GET['id']) && isset($_POST['publishComment'])) {
                moderateAdminComments($_GET['id'], $_POST['publishComment']);

            }
            else {
                throw new Exception('Veuillez sélectionner un bouton radio');

            }
        }
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage(); 
}

try {
    if(isset($_SESSION)) {
        if($_SESSION['pseudo'] == 'jean_forteroche') {
            if($_GET['action'] == 'showAdmin'){
                showAdmin();

            }
        }
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}


