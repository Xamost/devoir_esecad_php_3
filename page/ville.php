<?php
/*
 *
 * Ce fichier fait partie du devoir de php 3
 *
 * auteur : Thomas Loudoux
 * nom de fichier : ville.php
 * description :
 *  Ce fichier contient la page de la ville recherché par l'utilisateur.
 *
 */
    #On importe la minilib
    include ('../script/functions.php');
    if (empty($_GET)) # Si l'utilisater à rentré l'url de la page sans paramètre
    {
        redirect('../page/recherche.php');
    }

    # On récupère la session
    session_start();

    # Si il n'y as pas de SESSION utilisateur on renvoit l'utilisateur a l'index
    if(!isset($_SESSION['user']))
    {
        redirect('../index.php');
    }

    # On récupère le nom de la ville recherché
    $city_name = $_GET['city'];

    # On établie la connection
    $mysqli = mysql_connection();

    # on instencie la requete pour tous récupérer de la ville recherché
    $req = $mysqli->query('SELECT * from city WHERE city_name = "' . $city_name . '"');

    # On rend la réponse utilisable
    $row = $req->fetch_row();

    # Si l'utilisateur à rentré l'URL avec un mauvais nom de ville on le redirige sur la page de recherche
    if (empty($row))
    {
        redirect('../page/recherche.php');
    }
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Devoir PHP 3</title>
    <link rel="stylesheet" href="../css/normalize.css"/>
    <link rel="stylesheet" href="../css/master.css"/>
</head>
<body>
    <header>
        <div class="page_title"><h1>Votre recherche : <?php echo $city_name ; ?></h1></div>
    </header>

    <div class="container">
        <div class="content">
            <p>Superficie : <?php echo $row[2]; ?> km²</p>
            <p>Nombre d'habitant : <?php echo $row[3]; ?> </p>
            <p><?php echo $row[4]; ?></p>
        </div>
        <div class="link">
            <a class="button" href="../script/logout.php">Déconnection</a>
            <a class="button" href="../page/recherche.php">Recherche</a>
        </div>

    </div>
</body>
</html>
