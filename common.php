<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!session_id()) {
    session_start();
}

$db = new mysqli('localhost', 'root', '', 'serveradmin_schedule');

function dd($var) {
    echo "<br>Printing Var:<pre>\n";
    print_r($var); die;
}

function requiresLogin() {
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        die();
    }
}

