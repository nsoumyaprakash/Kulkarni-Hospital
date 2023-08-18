<?php
    require_once '../assets/utils/_dbconfig.php';
    
    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {   
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
                
        }else{
            // Sending Resent Comments
            $resData = [];
            $sql = "SELECT b.id, b.title, bc.name FROM blogs b JOIN blog_comments bc ON b.id = bc.blog_id WHERE b.deleted IS NULL AND bc.deleted IS NULL ORDER BY bc.created DESC LIMIT 6";
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
        }
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