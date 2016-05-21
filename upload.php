<?php

require_once "common.php";

$sql = <<<SQL
INSERT INTO `migration_schedule` (`ticket_id`, `client_contact`, `client_servername`, `server_type`, `migration_type`, `migration_date`)
VALUES ('$ticketId', '$clientContact', '$clientServer', '$serverType', '$migrationType', '$migrationDate', '$migrationStatus')
SQL;

$db->query($sql);

header('Location: index.php');