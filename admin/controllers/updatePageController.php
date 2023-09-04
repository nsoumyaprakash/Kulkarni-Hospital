<?php
	require '../assets/includes/checklogin.php';

	try {
        include "../assets/includes/utility_functions.php";
		require_once '../assets/includes/config.php';
        
        $editPageId = $_POST['editPageId']; 
        $editTitle = $_POST['editTitle']; 
        $editUrl = $_POST['editUrl'];
        $editUrl = mysqli_real_escape_string($conn, $editUrl);
        $editHtml = $_POST['editHtml']; 
        $editHtml = mysqli_real_escape_string($conn, $editHtml);                  
        $editCss = str_replace("<style>", "", $_POST['editCss']); 
        $editCss = str_replace("</style>", "", $editCss); 
        $editCss = mysqli_real_escape_string($conn, $editCss);                  
        $editJs = str_replace("<script>", "",$_POST['editJs']); 
        $editJs = str_replace("</script>", "",$editJs); 
        $editJs = mysqli_real_escape_string($conn, $editJs);                 
        $editStatus = isset($_POST['editStatus']) ? 1 : 0;
        
        $sql = "UPDATE `pages` SET `title` = '$editTitle', `url` = '$editUrl', `html` = '$editHtml', `css` = '$editCss',  `javascript` = '$editJs', `isActive` = '$editStatus', `updated` = NOW() WHERE id = '$editPageId' ";
        
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