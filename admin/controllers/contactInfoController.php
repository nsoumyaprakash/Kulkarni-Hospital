<?php
	require '../assets/includes/checklogin.php';

	function checkExistsOrNot($conn, $contactId) {
        $sql = "SELECT COUNT(id) AS COUNTS FROM contact WHERE id = '$contactId' ";
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
		$mapIframe = $_POST['mapIframe'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$phone = $_POST['call'];
		$opening_hours = $_POST['openingHours'];
        $socialLinks = $_POST['socialLinks'];
        $copyright = $_POST['copyRight'];
		$status = isset($_POST['addStatus']) ? 0 : 1;
		$checkExistsOrNot = checkExistsOrNot($conn, trim($contactId));

        if ($checkExistsOrNot == 0) {
            $sql = "INSERT INTO `contact` (`map`, `address`, `email`, `phone`, `social_links`, `opening_hours`, `copyright`, `isActive`, `created`) VALUES ('$mapIframe', '$address', '$email', '$phone', '$socialLinks', '$opening_hours', '$copyright', '$status', NOW())";
        } else {
            
            $sql = "UPDATE `contact` SET `map` = '$mapIframe', `address` = '$address', `email` = '$email', `phone` = '$phone', `social_links` = '$socialLinks', `opening_hours` = '$opening_hours',`copyright` = '$copyright', `isActive` = '$status', `updated` = NOW() WHERE id = '$contactId' ";
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