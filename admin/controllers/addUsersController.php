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
        
		$userName = trim($_POST['addUserFullName']);
		$userEmail = trim($_POST['addUserEmail']);
		$userMobileNo = trim($_POST['addUserPhoneNumber']);
		$userPassword = trim($_POST['addUserPassword']);
		$userRole = trim($_POST['addRole']);
		$userCode = trim($_POST['addOrganizationCode']);
		$userActive = isset($_POST['addUserStatus']) ? 1 : 0;
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
			$data = [
				'result' => [
					'status' => [
						'statusCode' => "1", 
						'errorCode' => "108",
						'errorMessage' => "Already Exists Try Different Email Id"
					]
				]
			];
			echo json_encode($data);
			exit();
		}

		$sql = "INSERT INTO `users` (`uuid`, `name`, `email`, `password`, `phone`, `role`, `orgCode`, `status`, `created_on`, `browser`) VALUES (UUID(), '$userName', '$userEmail', '$passwordHash', '$userMobileNo', '$userRole', '$userCode', '$userActive', NOW(), '$browser')";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			$data = [
				'result' => [
					'status' => [
						'statusCode' => "0"
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