<?php
    session_start();
    include "../connection.php";
    //echo $_POST['username'];
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    //$query = mysqli_query($connection, "SELECT * FROM admin WHERE username = '".$username."' AND password = '".$password."'");
    //if (mysqli_num_rows($query) == 1) {
    if (isset($username)) {
        if ($username == "Admin001" && $password == "12345") {
        //$_SESSION['username'] = $username;
            header("location: ../admincs");
        }
        if ($username == "Admin002" && $password == "12345") {
            //$_SESSION['username'] = $username;
            header("location: ../adminlayanan");
        }
        if ($username == "Admin003" && $password == "12345") {
            //$_SESSION['username'] = $username;
            header("location: ../adminpembayaran");
        }
        if ($username == "Lab001" && $password == "12345") {
            //$_SESSION['username'] = $username;
                header("location: ../labsertifikasi");
            }
        if ($username == "Kepala001" && $password == "12345") {
            //$_SESSION['username'] = $username;
            header("location: ../kepalalab");
        }
    }
    else {
        header("location: index.php?error");
        //echo mysqli_num_rows($query);
    }
?>