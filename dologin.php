<?php

require_once 'common.php';

if (true) {
    $_SESSION['user'] = [
        'id' => 1,
        'name' => 'Kendall',
    ];
}

header('Location: index.php');

