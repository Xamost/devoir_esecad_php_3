<?php
    include ('./functions.php');
    if (empty($_POST))
    {
        redirect('../index.php');
    }

    $input_username = $_POST['username'];
    $input_password = $_POST['password'];
    $mysqli = mysql_connection();
    $result = $mysqli->query('SELECT id, username, password FROM user WHERE username = "'. $input_username . '"');
    $row = $result->fetch_array();
    if (empty($row) or $row['password'] != $input_password)
    {
        $error = "Votre nom d'utilisateur ou votre mot de passe est erroné";
        redirect('../index.php?message=' . $error);
    }
    session_start();
    $_SESSION['user'] = $row;
    redirect('../page/recherche.php');
