<?php

require_once 'common.php';

//I did try to use $_POST but unfortunately a problem on my local was not allowing it to run without errors :(

$ticketId = $db->escape_string($_GET['ticketId']);
$clientContact = $db->escape_string($_GET['clientContact']);
$clientServer = $db->escape_string($_GET['clientServer']);
$serverName = $db->escape_string($_GET['serverType']);
$migrationType = $db->escape_string($_GET['migrationType']);
$migrationDate = $db->escape_string($_GET['migrationDate']);
$migrationStatus = $db->escape_string($_GET['migrationStatus']);



// Attempt insert query execution
$sql = "INSERT INTO migration_schedule (`ticket_id`, `client_contact`, `client_servername`, `server_type`, `migration_type`, `migration_date`, `migration_status`)
VALUES ('$ticketId', '$clientContact', '$clientServer', '$serverName', '$migrationType', '$migrationDate', '$migrationStatus')";



if(!$db->query($sql)){
    $_SESSION['flash'][] = "ERROR: Could not able to execute $sql. " . $db->error;
    header('Location: index.php');
}

$_SESSION['flash'][] = 'New record inserted!';
header('Location: index.php');