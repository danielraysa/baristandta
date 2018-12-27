<?php
    session_start();
    include "../connection.php";
    //echo $_POST['username'];
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['pass']);
    $query = mysqli_query($connection, "SELECT * FROM admin WHERE username = '".$username."' AND password = '".$password."'");
    if (mysqli_num_rows($query) == 1) {
        //$_SESSION['username'] = $username;
        header("location: ../index.html");
    }
    else {
        header("location: index.php?error");
        //echo mysqli_num_rows($query);
    }
?>