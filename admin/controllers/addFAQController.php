<?php
	require '../assets/includes/checkLogin.php';

	try {
		require_once '../assets/includes/config.php';
    
        $addQuestion = $_POST['addQuestion']; 
        $addQuestion = mysqli_real_escape_string($conn, $addQuestion);                  
        $addAnswer = $_POST['addAnswer']; 
        $addAnswer = mysqli_real_escape_string($conn, $addAnswer);                  
        $addStatus = isset($_POST['addStatus']) ? 1 : 0;
        
        $sql = "INSERT INTO `faqs` (`question`, `answer`, `isActive`, `created`) VALUES ('$addQuestion', '$addAnswer', '$addStatus', NOW())";
        
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