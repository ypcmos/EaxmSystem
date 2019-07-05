<?php
require_once "../../inc/mysql_connect.inc.php";

session_start();
header('Content-Type: text/html; charset=UTF-8');

if (isset($_POST['grade']) && isset($_POST['exam_id'])) {
    $grade = $dbc->escape_data($_POST['grade']);	
    if ($grade && floatval($grade) >= 5) {
        $exam_id = $dbc->escape_data($_POST['exam_id']);	
        if($grade && $exam_id)	
        {		
            $query = "SELECT id FROM exam_users WHERE user = '{$_SESSION['user']}'";
            $dbc->Execute($query);		
            if($dbc->rows == 1)		
            {			
                $row = $dbc->GetFields('id');			
                $id = $row[0];
            
                $query = "INSERT INTO exam_results(user_id, exam_id, grade, time) VAlUES ($id, $exam_id, $grade, NOW())";
                $dbc->Execute($query);
                if ($dbc->rows == 1)
                {
                    echo success;
                }
            }
        }
    }
}

?>