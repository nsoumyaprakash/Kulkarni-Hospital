<?php
	require '../assets/includes/checklogin.php';

	try {
		include "../assets/includes/utility_functions.php";
		require_once '../assets/includes/config.php';

        $doctorId = $_POST['editDoctorId'];
		$editName = $_POST['editName'];
		$editSpeciality = $_POST['editSpeciality'];
		$editAbout = $_POST['editAbout'];
		$editAbout = mysqli_real_escape_string($conn, $editAbout);                  
        $editFacebook = $_POST['editFacebook'];
        $editInstagram = $_POST['editInstagram'];
        $editTwitter = $_POST['editTwitter'];
        $editLinkedin = $_POST['editLinkedin'];
        $imageFile = $_FILES['editImageInput'];
        $arrayData = [$editFacebook, $editInstagram, $editTwitter, $editLinkedin];
        $socialLinks = json_encode($arrayData);
        $aboutStatus = isset($_POST['editStatus']) ? 1 : 0;
		
		
        
		if ($imageFile['name'] != "") {
			$imageName = handleFile($imageFile, "../../img/doctors/");
			$sql = "UPDATE `doctorsinfo` SET `name` = '$editName', `speciality` = '$editSpeciality', `about` = '$editAbout', `socialLinks` = '$socialLinks', `imgSrc` = '$imageName', `isActive` = '$aboutStatus', `updated` = NOW() WHERE id = '$doctorId' ";
		} else {
			$sql = "UPDATE `doctorsinfo` SET `name` = '$editName', `speciality` = '$editSpeciality', `about` = '$editAbout', `socialLinks` = '$socialLinks', `isActive` = '$aboutStatus', `updated` = NOW() WHERE id = '$doctorId' ";
		}
		$result = mysqli_query($conn, $sql);

		if ($result) {
			$data = [
				'result' => [
					'status' => [
						'statusCode' => "0",
                        'sql' => $sql,
                        'postId' => $postId
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