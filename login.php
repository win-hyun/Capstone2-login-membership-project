<?php
    $con = mysqli_connect('localhost', 'root', '', 'lecture'); // server name, user name, password, DB name
        
    if (mysqli_connect_errno()) {
        echo "1"; // Error code #1 => Connection Failed;
        exit();
    }

    $userid = $_POST["id"];
    $password = $_POST["password"];

    // Check if name exists
    $ProfessoridCheckqueery =  "SELECT professor_id FROM professor_users WHERE professor_id = '" . $userid . "';";
    $ProfessorpasswordCheckqueery =  "SELECT password FROM professor_users WHERE password = '" . $password . "';";
    $StudentidCheckqueery =  "SELECT student_id FROM student_users WHERE student_id = '" . $userid . "';";
    $StudentpasswordCheckqueery =  "SELECT password FROM student_users WHERE password = '" . $password . "';";

    $Professoridcheck = mysqli_query($con, $ProfessoridCheckqueery) or die("2: id check query failed"); // Error code #2 => id check query failed.
    $Professorpasswordcheck = mysqli_query($con, $ProfessorpasswordCheckqueery) or die("3: password check query failed"); // Error code #2 => id check query failed.
    $Studentidcheck = mysqli_query($con, $StudentidCheckqueery) or die("2: id check query failed"); // Error code #2 => id check query failed.
    $Studentpasswordcheck = mysqli_query($con, $StudentpasswordCheckqueery) or die("3: password check query failed"); // Error code #2 => id check query failed.

    if (mysqli_num_rows($Professoridcheck) != 1) {
        if (mysqli_num_rows($Studentidcheck) != 1) {
            echo "5: Either no user with id, or more than one";
            exit();
        }
    }

    if (mysqli_num_rows($Professorpasswordcheck) != 1) {
        if (mysqli_num_rows($Studentpasswordcheck) != 1) {
            echo "5: Either no user with password, or more than one";
            exit();
        }
    }

    echo "0";
?>
