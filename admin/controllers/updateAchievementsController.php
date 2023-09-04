<?php
	require '../assets/includes/checklogin.php';

	try {
		include "../assets/includes/utility_functions.php";
		require_once '../assets/includes/config.php';

        $achievementId = $_POST['editAchievementsId'];
        $editIcons = $_POST['editIcons'];
        $editNumbers = $_POST['editNumbers'];
        $editTitle = $_POST['editTitle']; 
        $editDescription = $_POST['editDescription']; 
        $editDescription = mysqli_real_escape_string($conn, $editDescription);                  
        $editMore = $_POST['editMore']; 
        $editMore = mysqli_real_escape_string($conn, $editMore);                  
        $editLink = $_POST['editLink'];
        $editStatus = isset($_POST['editStatus']) ? 1 : 0;
		
			$sql = "UPDATE `achievements` SET `icon` = '$editIcons', `numbers` = '$editNumbers', `title` = '$editTitle', `description` = '$editDescription', `moreLink` = '$editLink',`more` = '$editMore', `isActive` = '$editStatus', `updated` = NOW() WHERE id = '$achievementId' ";
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