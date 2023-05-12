<?php
    include ('./functions.php');
    if (empty($_POST))
    {
        redirect('../page/recherche.php');
    }
    session_start();
    $input_city = $_POST['search'];
    $mysqli = mysql_connection();
    $result = $mysqli->query('SELECT city_id, city_name FROM city WHERE city_name = "'. $input_city .'"');
    $row = $result->fetch_array();
    if (empty($row))
    {
        $error = "Votre recherche n'a rien donné veuillez verifier votre orthographe.";
        redirect('../page/recherche.php?message=' . $error);
    }
    if($mysqli->query('INSERT INTO search (user_id, ville_id) VALUES ('. $_SESSION['user']['user_id'] .','. $row['city_id'] .')') === TRUE)
    {
        redirect('../page/ville.php?city=' . $row['city_name']);
    }