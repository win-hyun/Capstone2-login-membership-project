<?php

    $con = mysqli_connect('localhost', 'root', '', 'lecture'); // server name, user name, password, DB name
    
    if (mysqli_connect_errno()) {
        echo "1"; // Error code #1 => Connection Failed;
        exit();
    }

    $username = $_POST["name"];
    $userid = $_POST["id"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Check if name exists
    $nameCheckqueery =  "SELECT name FROM professor_users WHERE name = '" . $username . "';";
    
    $namecheck = mysqli_query($con, $nameCheckqueery) or die("2: Name check query failed"); // Error code #2 => name check query failed.

    if (mysqli_num_rows($namecheck) > 0) {
        echo "3: Name already exists"; // Error code #3 => name check already exists cannot register
        exit();
    }

    // add user to the table
    $insertuserquery = "INSERT INTO professor_users (name, professor_id, password, email) values('" . $username . "', '" . $userid . "', '". $password . "', '" . $email . "');";
    mysqli_query($con, $insertuserquery) or die("4: Insert user query failed"); // Error code #4 => insert query failed.

    echo ("0");

?>