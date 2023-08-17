<?php
	try {
		require_once '../assets/utils/_dbconfig.php';
        
		$aboutData = [];
		$aboutFeatureData = [];
        
		$aboutSql = "SELECT `title`, `description`, `date_place`, `promo_video` FROM `about` WHERE `deleted` IS NULL";
		$aboutFeatureSql = "SELECT `title`, `content`, `icon` FROM `about_features` WHERE `deleted` IS NULL";

		$aboutResult = mysqli_query($conn, $aboutSql);
		$aboutFeatureResult = mysqli_query($conn, $aboutFeatureSql);
        
        if (!$aboutResult || !$aboutFeatureResult) {
            $data = [
                "status" => "Failed",
                "statusCode" => 500,
                "errorMessage" => "INTERNAL SERVER ERROR"
            ];
			echo json_encode($data);
			exit();
        }

		if (mysqli_num_rows($aboutResult) <= 0) {
			$data = [
                "status" => "Failed",
                "statusCode" => 300,
                "errorMessage" => "DATA NOT AVAILABLE"
            ];
			echo json_encode($data);
			exit();
		}

        while ($rows = mysqli_fetch_assoc($aboutResult)) {
            array_push($aboutData, $rows);
        }

        while ($rows = mysqli_fetch_assoc($aboutFeatureResult)) {
            array_push($aboutFeatureData, $rows);
        }

        // Close the connection
        mysqli_close($conn);

        $data = [
            "status" => "Success",
            "statusCode" => 0,
            "data" => [
                "aboutData" => $aboutData,
                "aboutFeatureData" => $aboutFeatureData
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