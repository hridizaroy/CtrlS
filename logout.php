<?php

require 'db.php';
session_start();

$username = $_SESSION['username'];

$sql = $mysqli->query("UPDATE activeStatus set status='0' where username='$username'");

$_SESSION['logged_in'] = false;

session_destroy();

header("location: index.html");