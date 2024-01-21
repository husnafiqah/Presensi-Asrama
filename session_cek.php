<?php

    session_start();
    if(!isset($_SESSION['nim'])){
        header("Location:index.php");
    }

?>