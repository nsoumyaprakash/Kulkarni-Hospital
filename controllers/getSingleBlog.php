<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            require_once '../assets/utils/_dbconfig.php';
            
            $blogId = $_POST['blogId'];
            $resData = [];
            $sql = "SELECT `thumbnail`, `title`, `content`, `tag`, `author`, `author_img`, `created` FROM `blogs` WHERE `id`='$blogId' AND `deleted` IS NULL";
            $comments = mysqli_query($conn, "SELECT COUNT(`id`) as comments FROM `blog_comments` WHERE `blog_id`='$blogId' AND `deleted` IS NULL");
            $result = mysqli_query($conn, $sql);
            
            if (!$result || !$comments) {
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
            
            $resData[0]['comments'] = mysqli_fetch_assoc($comments)['comments'];

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
    }
?>