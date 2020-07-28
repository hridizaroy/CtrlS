<?php

    require 'db.php';
    session_start();

    //Checking if logged in
    if($_SESSION['logged_in'] != true){
        $_SESSION['message'] = "Sorry. You're not logged in";
        header("location: error.php");
    }

    require 'functions.php';

    $projects = listProjects($_SESSION['teamName']);

    if (isset($_POST['projectName'])) {
        if (in_array($_POST['projectName'], $projects)) {
            echo "0";
        }
        else {
            echo "1";
        }
    }

?>