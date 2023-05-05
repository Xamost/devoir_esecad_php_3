<?php
    session_start();
    include ('../script/functions.php');
    print_r($_SESSION['user']['id']);
    $mysqli = mysql_connection();
    $result = $mysqli->query('SELECT ville_id FROM search WHERE user_id = "'. $_SESSION['user']['id'] . '"');
    while ($data = $result->fetch_row()) $row[] = $data[0];

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
    <link rel="stylesheet" href="../css/recherche.css"/>
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
        <div class="historique">
            <?php
                if(!empty($row))
                {
                    foreach ($row as $key => $value)
                    {
                        $city_result = $mysqli->query('SELECT name FROM city WHERE id = "'. $value . '"');
                        $city_row = $city_result->fetch_array();
                        $city[] = $city_row['name'];
                    }
                    $city = array_unique($city);
                    foreach ($city as $key => $value)
                    {
                        echo "<a class='button' href='./ville.php?city=". $value . "' >" . $value ."</a>";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
