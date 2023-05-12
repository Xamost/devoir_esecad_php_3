<?php
/**
 *  search.php
 * Ce fichier fait partie du devoir de php 3
 *
 * @author Thomas LOUDOUX <thomas.loudoux@gmail.com>
 *
 * description :
 * script du moteur de recherche très très simplifié
 * @version 0.0.1
 */

    #Importation de la minilib
    include ('./functions.php');

    #si la requête est vide on renvoie l'utilisateur vers la page de recherche
    if (empty($_POST))
    {
        redirect('../page/recherche.php');
    }

    # On ouvre la session
    session_start();

    # Si il n'y as pas de SESSION utilisateur on renvoit l'utilisateur a l'index
    if(!isset($_SESSION['user']))
    {
        redirect('../index.php');
    }

    #On récupère l'information de la requête
    $input_city = $_POST['search'];

    #On se connecte à la base de donnée
    $mysqli = mysql_connection();

    #On initialise la requête
    $req = $mysqli->query('SELECT city_id, city_name FROM city WHERE city_name = "'. $input_city .'"');

    #On récupère la reponce de la base de donnée
    $row = $req->fetch_array();

    #Si la réponse est vide c'est que la recherche n'à rien donnée. et donc on renvoie l'utilisateur sur la page de recherche avec un message d'erreur
    if (empty($row))
    {
        $error = "Votre recherche n'a rien donné veuillez verifier votre orthographe.";
        redirect('../page/recherche.php?message=' . $error);
    }
    #Si on a trouver la ville, dans la base de donnée, on enregistre la recherche dans l'historique de l'utilisateur
    # Ici la condition verifie juste le bonne envoie de la requête et si il n'y as pas de problème. si il y en as un c'est qu'on ne pourra pas charger la page suivante donc on le renvoie à la page de recherche avec une erreur.
    if($mysqli->query('INSERT INTO search (user_id, ville_id) VALUES ('. $_SESSION['user']['user_id'] .','. $row['city_id'] .')') === TRUE)
    {
        redirect('../page/ville.php?city=' . $row['city_name']);
    }
    else
    {
        $error = "Une erreur côter serveur nous empêche d'accéder à votre demande. veuillez nous excusez.";
        redirect('../page/recherche.php?message=' . $error);
    }