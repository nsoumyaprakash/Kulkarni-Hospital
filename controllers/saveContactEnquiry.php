<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            require_once '../assets/utils/_dbconfig.php';
            
            $name = $_POST['cname'];
            $email = $_POST['cmail'];
            $phone = $_POST['cnumber'];
            $subject = $_POST['csubject'];
            $message = $_POST['cmessage'];

            $sql = "INSERT INTO `contact_enquiries` (`name`, `email`, `phone`, `subject`, `message`, `created`) VALUES ('$name', '$email', '$phone', '$subject', '$message', current_timestamp());";
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
                "message" => "THANK YOU FOR CONTACTING US! WE WILL GET BACK TO YOU SOON."
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