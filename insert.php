<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "serveradmin_schedule");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution
$sql = "INSERT INTO migration_schedule (ticket_id, client_contact, client_servername, server_type, migration_type, migration_date, migration_status)
VALUES ('$ticketId', '$clientContact', '$clientServer', '$serverName', '$migrationType', '$migrationDate', '$migrationStatus')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>