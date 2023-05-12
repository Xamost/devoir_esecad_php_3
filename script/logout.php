<?php
/**
 *  logout.php
 * Ce fichier fait partie du devoir de php 3
 *
 * @author Thomas LOUDOUX <thomas.loudoux@gmail.com>
 *
 * description :
 * simple script de déconnection
 */

    include ('./functions.php');
    session_start();
    session_destroy();
    redirect('../index.php');