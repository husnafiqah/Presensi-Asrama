<?php
    
    session_start();
    unset($_SESSION['nim']);
    header('Location:index.php');
    
?>