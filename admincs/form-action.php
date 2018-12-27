<?php

    if ($_POST['id_pendaftaran'] != "") {
        header("location: ../admincs/?success");
    }
    else {
        header("location: ../admincs/?error");
    }
?>