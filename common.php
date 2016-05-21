<?php

$db = new mysqli('localhost', 'root', '', 'serveradmin_schedule');

function dd($var) {
    print_r($var); die;
}