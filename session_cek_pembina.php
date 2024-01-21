<?php

    session_start();
    if(!isset($_SESSION['idpembina'])){
        header("Location:loginpembina.php");
    }

?>