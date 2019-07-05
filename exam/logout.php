<?php
    session_start();
    if (isset($_SESSION['user']))
    {
    	$_SESSION = array();
    	session_destroy();
        //setcookie(session_name(), '', time()-300, '/', '', 0);
    }
    header("Location:index.php");
?>