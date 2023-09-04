<?php
	require '../assets/includes/checklogin.php';

	function checkExistsOrNot($conn, $landingId) {
        $sql = "SELECT COUNT(id) AS COUNTS FROM home_page WHERE id = '$landingId' ";
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
        
        $landingId = $_POST['editLandingtId'];
        $orgName = $_POST['orgNameInput'];
        $orgName = mysqli_real_escape_string($conn, $orgName);                 
        $title = $_POST['titleInput'];
        $title = mysqli_real_escape_string($conn, $title);                 
        $desc = $_POST['descInput'];
        $desc = mysqli_real_escape_string($conn, $desc);
		$imageFile = $_FILES['imageInput'];
		$checkExistsOrNot = checkExistsOrNot($conn, trim($landingId));

        if ($checkExistsOrNot == 0) {
			$imageName = handleFile($imageFile, "../../img/");
            $sql = "INSERT INTO `home_page` (`logo`, `org_name`, `heading`, `paragraph`, `created`) VALUES ('$imageName', '$orgName', '$title', '$desc', NOW())";
        } else {
			if ($imageFile['name'] != "") {
				$imageName = str_replace("'", "\'", handleFile($imageFile, "../../img/"));
				$sql = "UPDATE `home_page` SET `org_name` = '$orgName', `heading` = '$title', `paragraph` = '$desc', `logo` = '$imageName', `updated` = NOW() WHERE id = '$landingId' ";
			} else {
                $sql = "UPDATE `home_page` SET `org_name` = '$orgName', `heading` = '$title', `paragraph` = '$desc', `updated` = NOW() WHERE id = '$landingId' ";
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