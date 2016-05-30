<?php
/**
 * Date: 2016/05/19
 * Time: 8:42 PM
 * Server Admin Client Schedule project
 */

require_once "common.php";

//requiresLogin();

if (isset($_SESSION['flash'])) {
    $flashMessages = $_SESSION['flash'];
    unset($_SESSION['flash']);
}


$result = $db->query('SELECT * FROM `migration_schedule`');

?><!DOCTYPE html>
<html>
<head>
    <title>Migration Schedule 2016</title>

    <!-- Bootstrap core CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="img/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>

    <style>
        body {
            padding-top: 60px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                </button>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php"><span style="color: #ffffff;" class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
                    <li class="active"><a href="login.php">Login</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <?php if (isset($flashMessages)): ?>
        <div class="container">
            <?php foreach ($flashMessages as $message): ?>
                <div class="alert alert-success"><?= $message ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <h1 class="jumbotron">Server Admin Migration Schedule 2016</h1>
    </div>
    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    <th><span class="glyphicon glyphicon-fire" aria-hidden="true"></span></th>
                    <th>Ticket ID</th>
                    <th>Client Contact Information</th>
                    <th>Server Name</th>
                    <th>Server Type</th>
                    <th>Migration Type</th>
                    <th>Migration Date</th>
                    <th>Migration Status</th>
                    <th>Edit</th>
                </tr>
            </thead>

            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['ticket_id'] ?></td>
                    <td><?= $row['client_contact'] ?></td>
                    <td><?= $row['client_servername'] ?></td>
                    <td><?= $row['server_type'] ?></td>
                    <td><?= $row['migration_type'] ?></td>
                    <td><?= $row['migration_date'] ?></td>
                    <td><?= $row['migration_status'] ?></td>
                    <td><input type='checkbox' name='edit_record'></td>
                </tr>
            <?php endwhile; ?>
        </table>


        <hr>

        <div>
        <form class="form-group" action="insert.php" method="POST">
            <h3>Upload new Migration entry:</h3>
            <br/>
            <!-- TicketID -->
            <fieldset class="form-group">
                <label>Ticket ID:</label>
                <input type="text" name="ticketId" class="form-control" id="ticketId" placeholder="Example 'AAA-123-45678'">
            </fieldset>

            <!-- Client Contact details -->
            <fieldset class="form-group">
                <label>Client Contact details:</label>
                <input type="text" name="clientContact" class="form-control" id="clientContact" placeholder="Email and/or Contact number">
            </fieldset>

            <!-- Client Server Name -->
            <fieldset class="form-group">
                <label>Client Server Name:</label>
                <input type="text" name="clientServer" class="form-control" id="clientServer" placeholder="Example 'testing.aserv.co.za'">
            </fieldset>

            <!-- Server Type -->
            <fieldset class="form-group">
                <label>Server Type:</label>
                <select class="form-control" name="serverType" id="serverType">
                    <option>Shared</option>
                    <option>Reseller</option>
                    <option>Dedicated - Managed</option>
                    <option>Dedicated - Self-Managed</option>
                </select>
            </fieldset>

            <!-- Migration Type -->
            <fieldset class="form-group">
                <label>Migration Type:</label>
                <select class="form-control" name="migrationType" id="migrationType">
                    <option>VMware - HyperV</option>
                    <option>Other</option>
                </select>
            </fieldset>

            <!-- Migration Date -->
            <fieldset class="form-group">
                <label>Migration Date:</label>
                <input type="date" name="migrationDate" class="form-control" id="migrationDate">
            </fieldset>

            <!-- Migration Status -->
            <fieldset class="form-group">
                <label>Migration Status:</label>
                <select class="form-control" name="migrationStatus" id="migrationStatus">
                    <option>Pending</option>
                    <option>Completed</option>
                    <option>Cancelled</option>
                </select>
            </fieldset>

            <br/>
            <input type="submit" class="btn btn-primary"/>
        </form>
        </div>
    </div>

</body>

</html>