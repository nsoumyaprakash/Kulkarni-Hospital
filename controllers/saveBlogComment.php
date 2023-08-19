<?php
    try {
        require_once '../assets/utils/_dbconfig.php';
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $blogId = $_POST['blogId'];
            $name = $_POST['aname'];
            $email = $_POST['aemail'];
            $website = $_POST['website'];
            $message = $_POST['rmessage'];

            $sql = "INSERT INTO `blog_comments` (`blog_id`, `name`, `email`, `website_url`, `message`, `created`) VALUES ('$blogId', '$name', '$email', '$website', '$message', current_timestamp());";
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

            // Close the connection
            mysqli_close($conn);

            $data = [
                "status" => "Success",
                "statusCode" => 0,
                "message" => "COMMENTED SUCCESSFULLY"
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