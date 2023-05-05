<?php

function redirect($href)
    {
        header('Location:' . $href);
        exit();
    }
    function mysql_connection()
    {
        $HOSTNAME = 'localhost';
        $USERNAME = 'root';
        $PASSWORD = '';
        $DATABASE = 'php_intermediaire_1';

        return new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
    }