<?php
    include "dbconnection.php";
    session_start();
    if (isset($_POST['lemail'])  && isset($_POST['lpassword']) ) {

        
        //i dont see your password colom name, so i guess it password
        if ($stmt = mysqli_prepare($con, "SELECT p_id,p_fname,p_lname FROM patients WHERE email=? AND password=?")) {
            $email = $_POST['lemail'];
            $password = md5($_POST['lpassword']);
            mysqli_stmt_bind_param($stmt, "ss", $email, $password);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt,$p_id,$p_fname,$p_lname);

            echo mysqli_stmt_fetch($stmt);
            $_SESSION['p_id']=$p_id;
            $username = $p_fname . ' ' . $p_lname;
            $_SESSION['username']=$username ;

           // mysqli_stmt_close($stmt);
        }
    }

    echo false;
?>