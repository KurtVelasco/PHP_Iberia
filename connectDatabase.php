<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "iberia_database";
    $conn ="";
    $error = "";

    try{
        $conn = mysqli_connect($db_server,
        $db_user,
        $db_pass,
        $db_name);
    }
    catch(mysqli_sql_exception){
        $error = "Cannot Connect sadge";
    }

    if($conn){
        echo "You are connected<br>";
    }
    else{
        echo "{$error}<br>";
    }
?>
