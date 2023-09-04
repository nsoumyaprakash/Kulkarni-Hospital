<?php
	require '../assets/includes/checklogin.php';

	try {
		require_once '../assets/includes/config.php';
		$data = [];
		$sql = "SELECT * FROM inquiryinfo WHERE orgCode = '".$_SESSION['orgCode']."' ORDER BY id DESC";
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
				'enquiryInfoDetails' => $data,
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