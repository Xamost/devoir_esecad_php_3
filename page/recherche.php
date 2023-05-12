<?php

/*
 *
 * Ce fichier fait partie du devoir de php 3
 *
 * auteur : Thomas Loudoux
 * nom de fichier : recherche.php
 * description :
 *  Ce fichier contient la page de recherche, et la logique d'affichage de l'historique utilisateur.
 *
 */

    # On importe la minilib
    include ('../script/functions.php');

    # On démare la session utilisateur
    session_start();

    # Si il n'y as pas de SESSION utilisateur on renvoit l'utilisateur a l'index
    if(!isset($_SESSION['user']))
    {
        redirect('../index.php');
    }

    # On instencie la connection
    $mysqli = mysql_connection();

    # On instencie notre requète pour recupérer l'historique de l'utilisateur stocker dans la session. Faire un INNER JOIN est innutile puisque ça nous fait une requete plus lourde pour le serveur sql si l'utilisateur n'a pas d'historique
    $req = $mysqli->query('SELECT ville_id FROM search WHERE user_id = "'. $_SESSION['user'][0] . '"');

    # On récupère tous l'historique dans la variable #row qui est une arraylist
    while ($data = $req->fetch_row()) $row[] = $data[0];
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recherche ville</title>
    <link rel="stylesheet" href="../css/normalize.css"/>
    <link rel="stylesheet" href="../css/master.css"/>
</head>
<body>
    <header>
        <div class="page_title"><h1>Recherche de ville</h1></div>
    </header>
    <div>
        <form id="recherche_form" action="../script/search.php" method="post">
            <label>
                <input class="text_input" type="text" name="search" placeholder="Recherche" required/>
            </label>
            <input class="button" type="submit" value="Recherche"/>
        </form>
        <div class="info">
            <p class="error"><?php if(!empty($_GET)) echo 'ERREUR : ' . $_GET['message']; #Petit script d'affichage d'erreur pour l'utilisateur?></p>
            <a class="button" href="../script/logout.php">Déconnection</a>
        </div>
        <div class="historique">
            <?php
                if(!empty($row)) # SI l'utilisateur à déjà fait des recherche enregister dans la base :
                {
                    foreach ($row as $key => $value) # on parcours son historique
                    {
                        # On instencie la requete pour récupérer le nom des ville recherché.
                        $city_req = $mysqli->query('SELECT city_name FROM city WHERE city_id = "'. $value . '"');
                        # On transpose la reponse sous une forme utilisable
                        $city_row = $city_req->fetch_array();
                        // On ajoute cette ville à la fin d'une liste
                        $city[] = $city_row['city_name'];
                    }
                    $city = array_unique($city); #On supprime les doublon
                    foreach ($city as $key => $value) # On parcours la liste des nom de ville
                    {
                        # on génère notre lien accéder à la page déjà visité
                        echo "<a class='button' href='./ville.php?city=". $value . "' >" . $value ."</a>";
                    }
                }
            ?>
        </div>
        <div class="disconnect">
            <a class="button" href="../script/logout.php">Déconnection</a>
        </div>
    </div>
</body>
</html>
