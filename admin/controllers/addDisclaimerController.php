<?php
	require '../assets/includes/checkLogin.php';

	function checkExistsOrNot($conn, $disclaimerId) {
        $sql = "SELECT COUNT(id) AS COUNTS FROM disclaimer WHERE id = '$disclaimerId' ";
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
        
        $disclaimerId = $_POST['editDisclaimerId'];
        $privacyPolicyInput = $_POST['privacyPolicyInput'];
        $privacyPolicyInput = mysqli_real_escape_string($conn, $privacyPolicyInput);                 
        $termsAndConditionInput = $_POST['termsAndConditionInput'];
        $termsAndConditionInput = mysqli_real_escape_string($conn, $termsAndConditionInput);

        $checkExistsOrNot = checkExistsOrNot($conn, $aboutId);
        
        if ($checkExistsOrNot == 0) {
            $sql = "INSERT INTO `disclaimer` (`privacy_policy`, `terms_n_conditions`, `created`, `orgCode`) VALUES ('$privacyPolicyInput', '$termsAndConditionInput', NOW(), '".$_SESSION['orgCode']."')";
        } else {
            $sql = "UPDATE `disclaimer` SET `privacy_policy` = '$privacyPolicyInput', `terms_n_conditions` = '$termsAndConditionInput', `updated` = NOW() WHERE id = '$disclaimerId' ";
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