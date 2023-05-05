<?php
    include ('./functions.php');
    if (empty($_POST))
    {
        redirect('../page/recherche.php');
    }
    session_start();
    $input_city = $_POST['search'];
    $mysqli = mysql_connection();
    $result = $mysqli->query('SELECT id, name FROM city WHERE name = "'. $input_city .'"');
    $row = $result->fetch_array();
    if (empty($row))
    {
        redirect('../page/recherche.php');
    }
    if($mysqli->query('INSERT INTO search (user_id, ville_id) VALUES ('. $_SESSION['user']['id'] .','. $row['id'] .')') === TRUE)
    {
        redirect('../page/ville.php?city=' . $row['name']);
    }