<?php
	require '../assets/includes/checklogin.php';

	try {
		include "../assets/includes/utility_functions.php";
		require_once '../assets/includes/config.php';

        $serviceId = $_POST['editServiceId'];
        $editIcons = $_POST['editIcons'];
        $editTitle = $_POST['editTitle']; 
        $editPath = $_POST['editPath']; 
        $editDescription = $_POST['editDescription']; 
        $editDescription = mysqli_real_escape_string($conn, $editDescription);
		$imageFile = $_FILES['editImageInput'];
        $imageName = handleFile($imageFile, "../../img/uplaods/");
		$bannerImageFile = $_FILES['editBannerImageInput'];
        $bannerImageName = handleFile($bannerImageFile, "../../img/uplaods/");                  
        $editStatus = isset($_POST['editStatus']) ? 1 : 0;
        $editShortLong = isset($_POST['editShortLong']) ? 0 : 1;

		if ($imageFile['name'] != "" && $bannerImageFile['name'] != "") {
			$sql = "UPDATE `services` SET `icon` = '$editIcons', `title` = '$editTitle', `description` = '$editDescription', `slug` = '$editPath', `image` = '$imageName', `banner` = '$bannerImageName', `isActive` = '$editStatus', `isShort` = '$editShortLong', `updated` = NOW() WHERE id = '$serviceId' ";
		} else if ($imageFile['name'] != "") {
			$sql = "UPDATE `services` SET `icon` = '$editIcons', `title` = '$editTitle', `description` = '$editDescription', `slug` = '$editPath', `image` = '$imageName', `isActive` = '$editStatus', `isShort` = '$editShortLong', `updated` = NOW() WHERE id = '$serviceId' ";
		} else if ($bannerImageFile['name'] != "") {
			$sql = "UPDATE `services` SET `icon` = '$editIcons', `title` = '$editTitle', `description` = '$editDescription', `slug` = '$editPath',`banner` = '$bannerImageName', `isActive` = '$editStatus', `isShort` = '$editShortLong', `updated` = NOW() WHERE id = '$serviceId' ";
		} else {
			$sql = "UPDATE `services` SET `icon` = '$editIcons', `title` = '$editTitle', `description` = '$editDescription', `slug` = '$editPath', `isActive` = '$editStatus', `isShort` = '$editShortLong', `updated` = NOW() WHERE id = '$serviceId' ";
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