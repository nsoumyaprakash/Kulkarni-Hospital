<?php
	require '../assets/includes/checklogin.php';

	try {
        include "../assets/includes/utility_functions.php";
		require_once '../assets/includes/config.php';
        
        $addIcons = $_POST['addIcons'];
        $addTitle = $_POST['addTitle']; 
        $addPath = $_POST['addPath']; 
        $addDescription = $_POST['addDescription']; 
        $addDescription = mysqli_real_escape_string($conn, $addDescription); 
		$imageFile = $_FILES['addImageInput'];
        $imageName = handleFile($imageFile, "../../img/uplaods/");
		$bannerImageFile = $_FILES['addBannerImageInput'];
        $bannerImageName = handleFile($bannerImageFile, "../../img/uplaods/");                 
        $addStatus = isset($_POST['addStatus']) ? 1 : 0;
        $addShortLong = isset($_POST['addShortLong']) ? 0 : 1;
        
        $sql = "INSERT INTO `services` (`icon`, `title`, `description`,`image`, `banner`, `slug`, `isActive`,`isShort`, `created`, `orgCode`) VALUES ('$addIcons', '$addTitle', '$addDescription', '$imageName', '$bannerImageName', '$addPath', '$addStatus','$addShortLong', NOW(), '".$_SESSION['orgCode']."')";
        
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