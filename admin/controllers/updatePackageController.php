<?php
	require '../assets/includes/checklogin.php';

	try {
        include "../assets/includes/utility_functions.php";
		require_once '../assets/includes/config.php';
        
        $editPackageId = $_POST['editPackageId']; 
        $editTitle = $_POST['editTitle']; 
        $editPrice = $_POST['editPrice'];
        $editPrice = mysqli_real_escape_string($conn, $editPrice);
        $editBenifits = $_POST['editBenifits']; 
        $editBenifits = mysqli_real_escape_string($conn, $editBenifits);                  
        $editStatus = isset($_POST['editStatus']) ? 1 : 0;
        
        $sql = "UPDATE `packages` SET `title` = '$editTitle', `price` = '$editPrice', `benifits` = '$editBenifits', `isActive` = '$editStatus', `updated` = NOW() WHERE id = '$editPackageId' ";
        
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