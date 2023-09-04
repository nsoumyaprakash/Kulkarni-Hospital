<?php
	require '../assets/includes/checkLogin.php';

	function checkExistsOrNot($conn, $editDoctorDescId) {
        $sql = "SELECT COUNT(id) AS COUNTS FROM doctor_page_description WHERE id = '$editDoctorDescId' ";
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
        
        $editDoctorDescId = $_POST['editDoctorDescId'];
        $addDesc = $_POST['addDesc'];
        $aboutStatus = isset($_POST['addDescStatus']) ? 1 : 0;

		$checkExistsOrNot = checkExistsOrNot($conn, $editDoctorDescId);
        
        if ($checkExistsOrNot == 0) {
            $sql = "INSERT INTO `doctor_page_description` (`content`, `isActive`, `created`, `orgCode`) VALUES ('$addDesc', '$aboutStatus', NOW(), '".$_SESSION['orgCode']."')";
        } else {
                $sql = "UPDATE `doctor_page_description` SET `content` = '$addDesc', `isActive` = '$aboutStatus', `updated` = NOW() WHERE id = '$editDoctorDescId' ";
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
						'statusCode' => "2", 
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
					'statusCode' => "3", 
					'errorCode' => $e->getCode(), 
					'errorLine' => $e->getLine(), 
					'errorMessage' => $e->getMessage(),
					'errorFile' => $e->getFile(),
                    'sql' => $sql
				]
			]
		];
		echo json_encode($data);
		exit();
	}
?>