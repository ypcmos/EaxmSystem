<?php
require_once "../../inc/mysql_connect.inc.php";

session_start();
header('Content-Type: text/html; charset=UTF-8');

$query = "SELECT id, user_id, grade, exam_id, time FROM exam_results ORDER BY time DESC";
$dbc->Execute($query);		
if ($dbc->rows >= 1)		
{
    $ids = $dbc->GetFields('id');
    $user_ids = $dbc->GetFields('user_id');
    $grades = $dbc->GetFields('grade');
    $exam_ids = $dbc->GetFields('exam_id');
    $times = $dbc->GetFields('time');
    
    $data = array();
    $len = $dbc->rows;
    for ($i = 0; $i < $len; $i++) {
        $query = "SELECT user FROM exam_users WHERE id = $user_ids[$i]";
		$dbc->Execute($query);	
        if ($dbc->rows == 1) {
            $names = $dbc->GetFields('user');
        	$data[] = "{'id': $ids[$i], 'user_name': '$names[0]', 'grade': $grades[$i], 'exam_id': $exam_ids[$i], 'time': '$times[$i]'}";
        }
        
    }
    echo json_encode($data);
}

?>