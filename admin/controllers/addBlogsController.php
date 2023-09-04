<?php
	require '../assets/includes/checkLogin.php';

	try {
        include "../assets/includes/utility_functions.php";
		require_once '../assets/includes/config.php';
        
        $addTag = str_replace("'", "\'", $_POST['addTag']);
        $addTitle = str_replace("'", "\'", $_POST['addTitle']);
        $addContent = str_replace("'", "\'", $_POST['addContent']); 
        $addContent = mysqli_real_escape_string($conn, $addContent);                  
        $addAuthor = str_replace("'", "\'", $_POST['addAuthor']);
        $addImageInput = $_FILES['addImageInput'];
        $imageName = str_replace("'", "\'", handleFile($addImageInput, "../../img/uplaods/"));
        $addAuthorImageInput = $_FILES['addAuthorImageInput'];
        $authorImageName = str_replace("'", "\'", handleFile($addAuthorImageInput, "../../img/uplaods/"));
        $addStatus = isset($_POST['addStatus']) ? 1 : 0;

        if ($addStatus == '1') {
            $sql = "INSERT INTO `blogs` (`imgSrc`, `tag`, `title`, `content`, `authorImg`, `author`, `publishedAt`, `isActive`, `created`, `orgCode`) VALUES ('$imageName', '$addTag', '$addTitle', '$addContent', '$authorImageName', '$addAuthor', NOW(), '$addStatus', NOW(), '".$_SESSION['orgCode']."')";
        } else {
            $sql = "INSERT INTO `blogs` (`imgSrc`, `tag`, `title`, `content`, `authorImg`, `author`, `isActive`, `created`, `orgCode`) VALUES ('$imageName', '$addTag', '$addTitle', '$addContent', '$authorImageName', '$addAuthor', '$addStatus', NOW(), '".$_SESSION['orgCode']."')";
        }
        
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