<?php
	try {
		require_once '../assets/utils/_dbconfig.php';
        
        $blogId = $_POST['blogId'];
		$resData = [];
		$sql = "SELECT `name`, `message`, `created` FROM `blog_comments` WHERE `blog_id`='$blogId' AND `deleted` IS NULL ORDER BY `created` DESC";
		$result = mysqli_query($conn, $sql);
        
        if (!$result) {
            $data = [
                "status" => "Failed",
                "statusCode" => 500,
                "errorMessage" => "INTERNAL SERVER ERROR"
            ];
			echo json_encode($data);
			exit();
        }

		if (mysqli_num_rows($result) <= 0) {
			$data = [
                "status" => "Failed",
                "statusCode" => 300,
                "errorMessage" => "DATA NOT AVAILABLE"
            ];
			echo json_encode($data);
			exit();
		}

        while ($rows = mysqli_fetch_assoc($result)) {
            array_push($resData, $rows);
        }

        // Close the connection
        mysqli_close($conn);

        $data = [
            "status" => "Success",
            "statusCode" => 0,
            "data" => $resData
        ];

        echo json_encode($data);
        exit();
        
	} catch (Exception $e) {
		$data = [
            "status" => "Failed",
            "statusCode" => $e->getCode(),
            "errorLine" => $e->getLine(),
            "errorFile" => $e->getFile(),
            "errorMessage" => $e->getMessage()
        ];
		echo json_encode($data);
		exit();
	}
?>