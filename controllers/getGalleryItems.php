<?php
	try {
		require_once '../assets/utils/_dbconfig.php';
        
		$resData = [];
		$catResData = [];

		$sql = "SELECT `title`, `description`, `img`, `catagory` FROM `gallery` WHERE `deleted` IS NULL ORDER BY `created` DESC";
		$catSql = "SELECT DISTINCT `catagory`, `catagory_icon` FROM `gallery` WHERE `deleted` IS NULL";

		$result = mysqli_query($conn, $sql);
		$catResult = mysqli_query($conn, $catSql);
        
        if (!$result || !$catResult) {
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

        while ($rows = mysqli_fetch_assoc($catResult)) {
            array_push($catResData, $rows);
        }

        // Close the connection
        mysqli_close($conn);

        $data = [
            "status" => "Success",
            "statusCode" => 0,
            "data" => [
                "galleryData" => $resData,
                "catData" => $catResData
            ]
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