<?php
	require '../assets/includes/checklogin.php';

	try {
		require_once '../assets/includes/config.php';

        $FAQId = $_POST['editFAQId'];
		$editQuestion = $_POST['editQuestion']; 
        $editQuestion = mysqli_real_escape_string($conn, $editQuestion);                  
        $editAnswer = $_POST['editAnswer']; 
        $editAnswer = mysqli_real_escape_string($conn, $editAnswer);
        $aboutStatus = isset($_POST['editStatus']) ? 1 : 0;
		
			$sql = "UPDATE `faqs` SET `question` = '$editQuestion', `answer` = '$editAnswer', `isActive` = '$aboutStatus', `updated` = NOW() WHERE id = '$FAQId' ";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			$data = [
				'result' => [
					'status' => [
						'statusCode' => "0",
                        'sql' => $sql,
                        'FAQId' => $FAQId
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