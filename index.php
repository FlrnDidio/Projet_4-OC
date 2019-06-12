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
        elseif ($_GET['action'] == 'showAdmin') {
            showAdmin();
        }
        elseif ($_GET['action'] == 'showLog') {
            showLog();
        }
        elseif ($_GET['action'] == 'showContact') {
            showContact();
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
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'addPost') {  
            throw new Exception('1');
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                addPost($_POST['title'], $_POST['content']);
            }
            else {
                throw new Exception ('Tous les champs ne sont pas remplis');
            }
        }
        elseif ($_POST['action'] == 'getLog') {
            if (isset($_POST['pseudo']) && isset($_POST['pass'])) {
            getLog();
            }
            else {
                throw new Exception('Erreur connexion');
            }
        }
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage(); 
}


