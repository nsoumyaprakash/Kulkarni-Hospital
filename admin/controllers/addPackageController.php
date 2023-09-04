<?php
	require '../assets/includes/checklogin.php';

	try {
        include "../assets/includes/utility_functions.php";
		require_once '../assets/includes/config.php';
        
        $addTitle = $_POST['addTitle']; 
        $addPrice = $_POST['addPrice'];
        $addPrice = mysqli_real_escape_string($conn, $addPrice);
        $addBenifits = $_POST['addBenifits']; 
        $addBenifits = mysqli_real_escape_string($conn, $addBenifits);                  
        $addStatus = isset($_POST['addStatus']) ? 1 : 0;
        
        $sql = "INSERT INTO `packages` (`title`, `price`, `benifits`, `isActive`, `created`, `orgCode`) VALUES ('$addTitle', '$addPrice', '$addBenifits','$addStatus', NOW(), '".$_SESSION['orgCode']."')";
        
		$result = mysqli_query($conn, $sql);

		if ($result) {
			$data = [
				'result' => [
					'status' => [
						'statusCode' => "0",
                        'sql' => $sql
					]
				]
			];
			echo json_encode($data);
			exit();
		} else {
			$data = [
				'result' => [
					'status' => [
						'statusCode' => "1", 
						'errorCode' => mysqli_errno($conn),
						'errorMessage' => mysqli_error($conn),
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