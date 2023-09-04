<?php
	
require '../assets/includes/checkLogin.php';

	function checkExistsOrNot($conn, $aboutId) {
        $sql = "SELECT COUNT(id) AS COUNTS FROM about WHERE id = '$aboutId' ";
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
        
        $aboutId = $_POST['editAboutId'];
        $headingOne = $_POST['headingOneInput'];
        $headingOne = mysqli_real_escape_string($conn, $headingOne);                 
        $headingTwo = $_POST['headingTwoInput'];
        $headingTwo = mysqli_real_escape_string($conn, $headingTwo);
        $DescOne = $_POST['descOneInput'];
        $DescOne = mysqli_real_escape_string($conn, $DescOne);
        $DescTwo = $_POST['descTwoInput']; 
        $DescTwo = mysqli_real_escape_string($conn, $DescTwo);            
        $videoLink = $_POST['videoLinkInput']; 
        $videoLink = mysqli_real_escape_string($conn, $videoLink);                  
        $videoFrame = $_POST['videoFrameInput'];
        $videoFrame = mysqli_real_escape_string($conn, $videoFrame);
        $aboutStatus = isset($_POST['addAboutStatus']) ? 1 : 0;
        
        $imageOne = $_FILES['imageOneInput'];                    
        $imageTwo = $_FILES['imageTwoInput'];                    
        $imageThree = $_FILES['imageThreeInput'];                    
        $imageFour = $_FILES['imageFourInput'];                    
        $imageFive = $_FILES['imageFiveInput'];                    
        $imageSix = $_FILES['imageSixInput'];

        $imgArr = [$imageOne,$imageTwo,$imageThree,$imageFour,$imageFive,$imageSix];

		$checkExistsOrNot = checkExistsOrNot($conn, $aboutId);
        
        if ($checkExistsOrNot == 0) {
            $imageOneName = handleFile($imageOne, "../../img/uplaods/");
            $imageTwoName = handleFile($imageTwo, "../../img/uplaods/");
            $imageThreeName = handleFile($imageThree, "../../img/uplaods/");
            $imageFourName = handleFile($imageFour, "../../img/uplaods/");
            $imageFiveName = handleFile($imageFive, "../../img/uplaods/");
            $imageSixName = handleFile($imageSix, "../../img/uplaods/");
            
            $sql = "INSERT INTO `about` (`heading`, `description`, `videoLink`, `videoIframe`, `number1img`,  `number2img`, `number3img`, `number4img`, `number5img`, `number6img`, `more`, `moreHeading`, `isActive`, `created`, `orgCode`) VALUES ('$headingOne', '$DescOne', '$videoLink', '$videoFrame', '$imageOneName', '$imageTwoName', '$imageThreeName', '$imageFourName', '$imageFiveName', '$imageSixName', '$DescTwo', '$headingTwo', '$aboutStatus', NOW(), '".$_SESSION['orgCode']."')";
        } else {
            $imgAddon = "";
            for ($i=0; $i < count($imgArr); $i++) {
                if ($imgArr[$i]['name'] != "") {
                    $imgName = str_replace("'","\'",handleFile($imgArr[$i], "../../img/uplaods/"));
                    $imgAddon .= "`number".($i+1)."img` = '$imgName', ";
                }
            }
            
            $sql = "UPDATE `about` SET `heading` = '$headingOne', `description` = '$DescOne', `videoLink` = '$videoLink', `videoIframe` = '$videoFrame', ".$imgAddon." `more` = '$DescTwo', `moreHeading` = '$headingTwo', `isActive` = '$aboutStatus', `updated` = NOW()  WHERE id = '$aboutId' ";
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