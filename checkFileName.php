<?php

    require 'db.php';
    session_start();

    //Checking if logged in
    if($_SESSION['logged_in'] != true){
        $_SESSION['message'] = "Sorry. You're not logged in";
        header("location: error.php");
    }

    require 'functions.php';

    $files = listFiles($_SESSION['teamName'], $_SESSION['projectName']);

    if (isset($_POST['fileName'])) {
        if (in_array($_POST['fileName'].".txt", $files)) {
            echo "0";
        }
        else {
            echo "1";
        }
    }

?>