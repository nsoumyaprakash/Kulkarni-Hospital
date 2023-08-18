<?php
	try {
		require_once '../assets/utils/_dbconfig.php';
        
		$blogs = [];
		$comments = [];
		$sql = "SELECT `id`, `thumbnail`, `title`, `content`, `tag`, `author`, `author_img`, `created` FROM `blogs` WHERE `deleted` IS NULL ORDER BY `created` DESC";
		$result = mysqli_query($conn, $sql);
        $commentsResult = mysqli_query($conn, "SELECT `blog_id` FROM `blog_comments` WHERE `deleted` IS NULL");
        
        if (!$result || !$commentsResult) {
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
            array_push($blogs, $rows);
        }

        while ($rows = mysqli_fetch_assoc($commentsResult)) {
            array_push($comments, $rows);
        }

        for ($i=0; $i < count($comments); $i++) {
            for ($j=0; $j < count($blogs); $j++) {
                if ($comments[$i]['blog_id'] == $blogs[$j]['id']) {
                    if (isset($blogs[$j]['comments'])) {
                        $blogs[$j]['comments'] = $blogs[$j]['comments'] + 1;
                    }else {
                        $blogs[$j]['comments'] = 1;
                    }
                }
            }
        }

        // Close the connection
        mysqli_close($conn);

        $data = [
            "status" => "Success",
            "statusCode" => 0,
            "data" => $blogs
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