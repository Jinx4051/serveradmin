<?php

require_once 'common.php';

$ticketId = $db->escape_string($_POST['ticketId']);
$clientContact = $db->escape_string($_POST['clientContact']);
$clientServer = $db->escape_string($_POST['clientServer']);
$serverName = $db->escape_string($_POST['serverType']);
$migrationType = $db->escape_string($_POST['migrationType']);
$migrationDate = $db->escape_string($_POST['migrationDate']);
$migrationStatus = $db->escape_string($_POST['migrationStatus']);

// Attempt insert query execution
$sql = "INSERT INTO migration_schedule (`ticket_id`, `client_contact`, `client_servername`, `server_type`, `migration_type`, `migration_date`, `migration_status`)
VALUES ('$ticketId', '$clientContact', '$clientServer', '$serverName', '$migrationType', '$migrationDate', '$migrationStatus')";


// sql to delete a record
$sqlremove = "DELETE FROM migration_schedule WHERE id=''";

if (mysqli_query($db, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($db);
}



if(!$db->query($sql)){
    $_SESSION['flash'][] = "ERROR: Could not able to execute $sql. " . $db->error;
    header('Location: index.php');
}

$_SESSION['flash'][] = 'New record inserted!';
header('Location: index.php');