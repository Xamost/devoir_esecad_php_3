<?php
/**
 *  functions.php
 * Ce fichier fait partie du devoir de php 3
 *
 * @author Thomas LOUDOUX <thomas.loudoux@gmail.com>
 *
 * description :
 *  Mini librairie de fonction
 *
 */

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();
/**
 * description :
 *  On utilise cette fonction pour rediriger et arrêter le flux de la page.
 * @author Thomas LOUDOUX <thomas.loudoux@gmail.com>
 * @param string    $href   Liens de redirection
 * @return void
 */
    function redirect(string $href)
    {
        header('Location:' . $href);
        exit();
    }

/**
 * description :
 *  On utilise cette fonction Pour ce connecter à la base de donnée
 * @author Thomas LOUDOUX <thomas.loudoux@gmail.com>
 * @return mysqli
 */
    function mysql_connection(): mysqli
    {

        $HOSTNAME = $_ENV['DB_HOSTNAME'];
        $USERNAME = $_ENV['DB_USERNAME'];
        $PASSWORD = $_ENV['DB_PASSWORD'];
        $DATABASE = $_ENV['DB_DATABASE'];

        return new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
    }