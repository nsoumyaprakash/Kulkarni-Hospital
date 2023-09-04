<?php
	require '../assets/includes/checklogin.php';

	function checkExistsOrNot($conn, $landingId) {
        $sql = "SELECT COUNT(id) AS COUNTS FROM landing WHERE id = '$landingId' ";
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
        $link = $_POST['linkInput']; 
        $link = mysqli_real_escape_string($conn, $link);                  
        $text = $_POST['textInput'];
        $text = mysqli_real_escape_string($conn, $text);
        $aboutStatus = isset($_POST['addLandingStatus']) ? 1 : 0;
		$imageFile = $_FILES['imageInput'];
		$bgImageFile = $_FILES['bgImageInput'];
		$checkExistsOrNot = checkExistsOrNot($conn, trim($landingId));

		// echo ($imageFile['name'] ."----". $bgImageFile['name']);
		// exit();
        
        if ($checkExistsOrNot == 0) {
			$imageName = handleFile($imageFile, "../../img/uplaods/");
			$bgImageName = handleFile($bgImageFile, "../../img/uplaods/");
            $sql = "INSERT INTO `landing` (`organization_name`, `title`, `description`, `link`, `linkText`, `logo`, `bg_img`, `isActive`, `created`, `orgCode`) VALUES ('$orgName', '$title', '$desc', '$link', '$text', '$imageName', '$bgImageName', '$aboutStatus', NOW(), '".$_SESSION['orgCode']."')";
        } else {
			if ($imageFile['name'] != "" && $bgImageFile['name'] != "") {
				// echo "both";
				$imageName = str_replace("'", "\'", handleFile($imageFile, "../../img/uplaods/"));
				$bgImageName = str_replace("'", "\'",handleFile($bgImageFile, "../../img/uplaods/"));
				$sql = "UPDATE `landing` SET `organization_name` = '$orgName', `title` = '$title', `description` = '$desc', `link` = '$link', `linkText` = '$text', `bg_img` = '$bgImageName', `logo` = '$imageName', `isActive` = '$aboutStatus', `updated` = NOW() WHERE id = '$landingId' ";
			} else if ($bgImageFile['name'] != "") {
				// echo "bg";
				$bgImageName = str_replace("'", "\'",handleFile($bgImageFile, "../../img/uplaods/"));
				$sql = "UPDATE `landing` SET `organization_name` = '$orgName', `title` = '$title', `description` = '$desc', `link` = '$link', `linkText` = '$text', `bg_img` = '$bgImageName', `isActive` = '$aboutStatus', `updated` = NOW() WHERE id = '$landingId' ";
			} else if ($imageFile['name'] != "" ) {
				// echo "logo";
				$imageName = str_replace("'", "\'", handleFile($imageFile, "../../img/uplaods/"));
				$sql = "UPDATE `landing` SET `organization_name` = '$orgName', `title` = '$title', `description` = '$desc', `link` = '$link', `linkText` = '$text', `logo` = '$imageName', `isActive` = '$aboutStatus', `updated` = NOW() WHERE id = '$landingId' ";
			} else {
                $sql = "UPDATE `landing` SET `organization_name` = '$orgName', `title` = '$title', `description` = '$desc', `link` = '$link', `linkText` = '$text', `isActive` = '$aboutStatus', `updated` = NOW() WHERE id = '$landingId' ";
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