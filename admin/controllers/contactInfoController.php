<?php
	require '../assets/includes/checklogin.php';

	function checkExistsOrNot($conn, $contactId) {
        $sql = "SELECT COUNT(id) AS COUNTS FROM contactinfo WHERE id = '$contactId' ";
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

        $contactId = $_POST['editContactInfoId'];
		$shortText = $_POST['shortText'];
		$mapIframe = $_POST['mapIframe'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$call = $_POST['call'];
		$otherLink = $_POST['otherLink'];
        $socialLinks = $_POST['socialLinks'];
		$status = isset($_POST['addStatus']) ? 1 : 0;
		$checkExistsOrNot = checkExistsOrNot($conn, trim($contactId));

        if ($checkExistsOrNot == 0) {
            $sql = "INSERT INTO `contactinfo` (`shortText`, `mapIframe`, `other`, `address`, `email`, `phone`, `isActive`, `created`, `social_links`, `orgCode`) VALUES ('$shortText', '$mapIframe', '$otherLink', '$address', '$email', '$call', '$status', NOW(), '$socialLinks', '".$_SESSION['orgCode']."')";
        } else {
            
            $sql = "UPDATE `contactinfo` SET `shortText` = '$shortText', `mapIframe` = '$mapIframe', `other` = '$otherLink', `address` = '$address', `email` = '$email', `phone` = '$call', `isActive` = '$status', `social_links` = '$socialLinks', `updated` = NOW() WHERE id = '$contactId' ";
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