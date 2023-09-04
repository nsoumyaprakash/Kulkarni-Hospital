<?php
	require '../assets/includes/checklogin.php';

	try {
		require_once '../assets/includes/config.php';

		function checkUserEmailExistsOrNot($conn, $userEmail) {
			$sql = "SELECT COUNT(id) AS COUNTS FROM users WHERE email = '$userEmail'";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				if (mysqli_num_rows($result) > 0) {
					while ($rows = mysqli_fetch_assoc($result)) {
						$counts = $rows['COUNTS'];
					}
				} else {
					$counts = 0;
				}
				
			} else {
				$counts = -1;
			}
			return $counts;
		}

        $userId = $_POST['editUserId'];
		$userName = trim($_POST['editUserFullName']);
		$userEmail = trim($_POST['editUserEmail']);
		$userMobileNo = trim($_POST['editUserPhoneNumber']);
		$userPassword = trim($_POST['editUserPassword']);
		$userRole = trim($_POST['editRole']);
		$userCode = trim($_POST['editOrganizationCode']);
		$userActive = isset($_POST['editUserStatus']) ? 1 : 0;
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
		$passwordHash = password_hash($userPassword, PASSWORD_DEFAULT);
		if (strpos($userAgent, 'Chrome') !== false) {
            $browser = 'Google Chrome';
		} elseif (strpos($userAgent, 'Firefox') !== false) {
            $browser = 'Mozilla Firefox';
		} elseif (strpos($userAgent, 'Safari') !== false) {
            $browser = 'Apple Safari';
		} elseif (strpos($userAgent, 'Opera') !== false) {
            $browser = 'Opera';
		} elseif (strpos($userAgent, 'Edge') !== false) {
            $browser = 'Microsoft Edge';
		} else {
            $browser = 'Unknown';
		}
		
		$checkUserEmailExistsOrNot = checkUserEmailExistsOrNot($conn, $userEmail);
		if ($checkUserEmailExistsOrNot > 0) {
			$sql = "UPDATE `users` SET `uuid` = UUID(), `name` = '$userName', `password` = '$passwordHash', `phone` = '$userMobileNo', `role` = '$userRole', `orgCode` = '$userCode', `status` = '$userActive', `updated_on` = NOW(), `browser` = '$browser' WHERE id = '$userId'";
		} else {
			$sql = "UPDATE `users` SET `uuid` = UUID(), `name` = '$userName', `email` = '$userEmail', `password` = '$passwordHash', `phone` = '$userMobileNo', `role` = '$userRole', `orgCode` = '$userCode', `status` = '$userActive', `updated_on` = NOW(), `browser` = '$browser' WHERE id = '$userId'";
		}
        
		$result = mysqli_query($conn, $sql);

		if ($result) {
			$data = [
				'result' => [
					'status' => [
						'statusCode' => "0",
                        'sql' => $sql,
                        'userId' => $userId
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