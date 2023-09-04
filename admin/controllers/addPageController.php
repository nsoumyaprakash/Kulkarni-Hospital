<?php
	require '../assets/includes/checklogin.php';

	try {
        include "../assets/includes/utility_functions.php";
		require_once '../assets/includes/config.php';
        
        $addTitle = $_POST['addTitle']; 
        $addUrl = $_POST['addUrl'];
        $addUrl = mysqli_real_escape_string($conn, $addUrl);
        $addHtml = $_POST['addHtml']; 
        $addHtml = mysqli_real_escape_string($conn, $addHtml);                  
        $addCss = str_replace("<style>", "", $_POST['addCss']); 
        $addCss = str_replace("</style>", "", $addCss); 
        $addCss = mysqli_real_escape_string($conn, $addCss);                  
        $addJs = str_replace("<script>", "",$_POST['addJs']); 
        $addJs = str_replace("</script>", "",$addJs); 
        $addJs = mysqli_real_escape_string($conn, $addJs);                 
        $addStatus = isset($_POST['addStatus']) ? 1 : 0;
        
        $sql = "INSERT INTO `pages` (`title`, `url`, `html`, `css`, `javascript`, `isActive`, `created`, `orgCode`) VALUES ('$addTitle', '$addUrl', '$addHtml','$addCss','$addJs','$addStatus', NOW(), '".$_SESSION['orgCode']."')";
        
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