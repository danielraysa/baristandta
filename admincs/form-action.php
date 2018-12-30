<?php
    //session_start();
    include "../connection.php";
    
    try {    
        header("location: ../admincs/?success");
    }
    catch (Exception $e) {
        header("location: ../admincs/?error");
    }
?>