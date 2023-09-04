<?php
	require '../assets/includes/checkLogin.php';

	try {
        include "../assets/includes/utility_functions.php";
		require_once '../assets/includes/config.php';
        
        $addIcons = $_POST['addIcons'];
        $addNumbers = $_POST['addNumbers'];
        $addTitle = $_POST['addTitle']; 
        $addDescription = $_POST['addDescription']; 
        $addDescription = mysqli_real_escape_string($conn, $addDescription);                  
        $addMore = $_POST['addMore']; 
        $addMore = mysqli_real_escape_string($conn, $addMore);                  
        $addLink = $_POST['addLink'];
        $addStatus = isset($_POST['addStatus']) ? 1 : 0;
        
        $sql = "INSERT INTO `achievements` (`icon`, `numbers`, `title`, `description`, `moreLink`,`more`, `isActive`, `created`, `orgCode`) VALUES ('$addIcons', '$addNumbers', '$addTitle', '$addDescription', '$addLink','$addMore', '$addStatus', NOW(), '".$_SESSION['orgCode']."')";
        
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