<?php
	require '../assets/includes/checkLogin.php';

	try {
        include "../assets/includes/utility_functions.php";
		require_once '../assets/includes/config.php';
        
        $addName = $_POST['addName'];
        $addSpeciality = $_POST['addSpeciality'];
        $addAbout = $_POST['addAbout']; 
        $addAbout = mysqli_real_escape_string($conn, $addAbout);                  
        $addFacebook = $_POST['addFacebook'];
        $addInstagram = $_POST['addInstagram'];
        $addTwitter = $_POST['addTwitter'];
        $addLinkedin = $_POST['addLinkedin'];
        $imageFile = $_FILES['addImageInput'];
        $imageName = handleFile($imageFile, "../../img/doctors/");
        $arrayData = [$addFacebook, $addInstagram, $addTwitter, $addLinkedin];
        $socialLinks = json_encode($arrayData);
        $addStatus = isset($_POST['addStatus']) ? 1 : 0;
        
        $sql = "INSERT INTO `doctorsinfo` (`name`, `speciality`, `about`, `socialLinks`, `imgSrc`, `isActive`, `created`, `orgCode`) VALUES ('$addName', '$addSpeciality', '$addAbout', '$socialLinks', '$imageName', '$addStatus', NOW(), '".$_SESSION['orgCode']."')";
        
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