<?php
	// session_start();
	// if (!isset($_SESSION['user_id']) && $_SESSION['user_id']=="") {
	// 	$data = [
	// 		'result' => [
	// 			'status' => [
	// 				'statusCode' => "1", 
	// 				'errorCode' => "900",
	// 				'errorMessage' => "SESSION EXPIRED PLEASE RELOGIN",
	// 			]
	// 		]
	// 	];
	// 	echo json_encode($data);
	// 	exit();
	// }

	function checkExistsOrNot($conn, $userId) {
        $sql = "SELECT COUNT(id) AS COUNTS FROM users WHERE id = '$userId'";
        // echo $sql; exit();
        $result = mysqli_query($conn, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    $counts = $rows["COUNTS"];
                }
            } else {
                $counts = 0;
            }
        } else {
            $counts = -1;
        } 
        return $counts;
    }

	try {
        include "../assets/includes/utility_functions.php";
		require_once '../assets/includes/config.php';

        $userId = $_POST['editUserProfileId'];
		$fullName = $_POST['fullName'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
        $imageFile = $_FILES['imageInput'];
		$checkExistsOrNot = checkExistsOrNot($conn, trim($userId));

        if ($checkExistsOrNot == 0) {
            $imageName = handleFile($imageFile, "../../img/uplaods/");
            $sql = "INSERT INTO `users` (`uuid`, `name`, `email`, `phone`, `image`, `created_on`) VALUES (UUID(), '$fullName', '$email', '$phone', '$imageName', NOW())";
        } else {
            if ($imageFile['name'] != "") {
                $imageName = handleFile($imageFile, "../../img/uplaods/");
                $sql = "UPDATE `users` SET `uuid` = UUID(), `name` = '$fullName', `email` = '$email',`phone` = '$phone', `image` = '$imageName', `updated_on` = NOW() WHERE id = '$userId'";
            } else {
                $sql = "UPDATE `users` SET `uuid` = UUID(), `name` = '$fullName', `email` = '$email',`phone` = '$phone', `updated_on` = NOW() WHERE id = '$userId'";
            }
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
                        'sql' => $sql,
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