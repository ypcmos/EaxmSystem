<?php
require_once "../../inc/mysql_connect.inc.php";

session_start();
header('Content-Type: text/html; charset=UTF-8');

if (isset($_POST['user']) && isset($_POST['password'])) {
    $user = $dbc->escape_data($_POST['user']);	
    $password = $dbc->escape_data($_POST['password']);	
    if($user && $password)	
    {		
        $query = "SELECT user, permission FROM exam_users WHERE user = '$user' AND password = '$password'";	
        echo $query;
        $dbc->Execute($query);		
        if($dbc->rows == 1)		
        {			
            $row = $dbc->GetFields('user');			
            $_SESSION['user'] = $row[0];
            $row = $dbc->GetFields('permission');	
            $_SESSION['permission'] = $row[0];
        }   
    }
}

?>