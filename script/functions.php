<?php
/**
 *  functions.php
 * Ce fichier fait partie du devoir de php 3
 *
 * @author Thomas LOUDOUX <thomas.loudoux@gmail.com>
 *
 * description :
 *  Mini librairie de fonction
 */

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
 * note :
 *  Je devrais faire des verification si la connection avec la base de donnée est stable ou non.
 */
    function mysql_connection(): mysqli
    {

        $HOSTNAME = 'localhost';
        $USERNAME = 'root';
        $PASSWORD = '';
        $DATABASE = 'php_intermediaire_1';

        return new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
    }