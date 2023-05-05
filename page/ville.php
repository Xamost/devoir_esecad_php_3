<?php
    include ('../script/functions.php');
    if (empty($_GET))
    {
        redirect('../page/recherche.php');
    }
    session_start();
    $city_name = $_GET['city'];
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
    <link rel="stylesheet" href="../css/ville.css"/>
</head>
<body>
    <header>
        <div class="page_title"><h1>Votre recherche : <?php echo $city_name ; ?></h1></div>
    </header>
    <div>
        <a class="button" href="../script/logout.php">Déconnection</a>
        <a class="button" href="../page/recherche.php">Recherche</a>
    </div>
</body>
</html>
