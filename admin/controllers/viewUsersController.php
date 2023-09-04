<?php
	require '../assets/includes/checklogin.php';

	try {
		require_once '../assets/includes/config.php';
		$data = [];
		$fromDate = $_POST['fromDate'];
		$toDate = $_POST['toDate'];
		
		if ($fromDate != "" && $toDate != "") {
			$fromDate = date('Y-m-d', strtotime($fromDate));
			$toDate = date('Y-m-d', strtotime($toDate));
			
			$sql = "SELECT * FROM users WHERE created_on <= '$toDate 23:59:59' AND created_on >= '$fromDate 00:00:00' ORDER BY id DESC";
		} else {
			$sql = "SELECT * FROM users ORDER BY id DESC";
		}
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);
		if ($count > 0) {
			while ($rows = mysqli_fetch_assoc($result)) {
				array_push($data, $rows);
			}
			$mainData = [
				'result' => [
					'status' => [
						'statusCode' => "0"
                    ]
                ],
				'usersDetails' => $data,
				'sql' => $sql
            ];
			echo json_encode($mainData);
			exit();
		} else {
			$data = [
				'result' => [
					'status' => [
						'statusCode' => "1", 
						'errorCode' => "300",
						'errorMessage' => "DATA NOT AVAILABLE",
						'sql' => $sql

                    ]
                ]
            ];
			echo json_encode($data);
			exit();
		}
		

	} catch (Exception $e) {
		$data = [
			'result' => [
				'status' => [
					'statusCode' => "1", 
					'errorCode' => $e->getCode(), 
					'errorLine' => $e->getLine(), 
					'errorMessage' => $e->getMessage(),
					'errorFile' => $e->getFile()
				]
			]
		];
		echo json_encode($data);
		exit();
	}
?>