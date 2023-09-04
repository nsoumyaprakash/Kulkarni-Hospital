<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
        $data = [
            'result' => [
            	'status' => [
            		'statusCode' => "1", 
            		'errorCode' => "900",
            		'errorMessage' => "SESSION EXPIRED PLEASE RELOGIN"
            	]
            ]
        ];
        echo json_encode($data);
        exit();
    }
?>