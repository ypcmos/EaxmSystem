<?php
if(!isset($_SESSION['user']))
{ 
    header("Location: /exam/index.php"); 
    exit;
}
?>