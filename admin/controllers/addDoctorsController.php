<?php
	require '../assets/includes/checkLogin.php';

	try {
        include "../assets/includes/utility_functions.php";
		require_once '../assets/includes/config.php';
        
        $addDept = $_POST['addDept'];
        $addName = $_POST['addName'];
        $addSpeciality = $_POST['addSpeciality'];
        $addAbout = $_POST['addAbout']; 
        $addAbout = mysqli_real_escape_string($conn, $addAbout);
        $imageFile = $_FILES['addImageInput'];
        $imageName = handleFile($imageFile, "../../img/doctors/");
        $addStatus = isset($_POST['addStatus']) ? 0 : 1;
        
        $sql = "INSERT INTO `doctors` (`dept_id`, `img`, `name`, `speciality`, `description`, `isActive`, `created`) VALUES ('$addDept', '$imageName', '$addName', '$addSpeciality', '$addAbout', '$addStatus', NOW())";
        
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