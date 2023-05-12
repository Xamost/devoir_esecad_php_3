<?php
/**
 *  login.php
 * Ce fichier fait partie du devoir de php 3
 *
 * @author Thomas LOUDOUX <thomas.loudoux@gmail.com>
 *
 * description :
 * script de connection
 * @version 0.0.1
 * il manque de la protection mais ça fait l'affaire
 */

    #On importe notre minilin
    include ('./functions.php');
    if (empty($_POST)) #si la requête est vide on renvoie à la page de formulaire
    {
        redirect('../index.php');
    }
    # On sort les informations rentrée par l'utilisateur
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];
    #On initialise la connection à la base de donnée
    $mysqli = mysql_connection();
    #initialisation de la requête
    $req = $mysqli->query('SELECT * FROM user WHERE user_name = "'. $input_username . '"');
    #Récupération de la réponse de la database
    $row = $req->fetch_row();
    #Si l'utilisateur à rentré des informations erroné on le renvoie avec un message
    if (empty($row) or $row[2] != $input_password)
    {
        $error = "Votre nom d'utilisateur ou votre mot de passe est erroné";
        redirect('../index.php?message=' . $error);
    }
    # Sinon on créer la session et on l'envoie vers la page de recherche
    session_start();
    $_SESSION['user'] = $row;
    redirect('../page/recherche.php');
