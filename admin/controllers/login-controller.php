<?php
try {
    require_once '../assets/includes/config.php';
    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    session_start();
    $sql = "SELECT * FROM `users` WHERE `email` = '$username'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    
    if ($count > 0) {
        while ($rows = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $rows['password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $rows['id'];
                $_SESSION['name'] = $rows['name'];
                $_SESSION['phone'] = $rows['phone'];
                $_SESSION['email'] = $rows['email'];
                $_SESSION['status'] = $rows['status'];
                $_SESSION['image'] = $rows['image'];
                $_SESSION['role'] = $rows['role'];
                $_SESSION['orgCode'] = $rows['orgCode'];
            }else{
                $data = [
                    'result' => [
                        'status' => [
                            'statusCode' => "1", 
                            'errorCode' => "301", 
                            'errorMessage' => "Invalid Password"
                        ]
                    ]
                ];
                echo json_encode($data);
                exit();
            }
        }

        if ($_SESSION['status'] == 0) {
            $data = [
                'result' => [
                    'status' => [
                        'statusCode' => "1", 
                        'errorCode' => "300", 
                        'errorMessage' => "Account Deactivated"
                    ]
                ]
            ];
            echo json_encode($data);
            exit();
        }

        mysqli_query($conn, "UPDATE `users` SET `last_login` = NOW() WHERE `users`.`id` = ".$_SESSION['id'].";");

        $data = [
            'result' => [
                'status' => [
                    'statusCode' => "0"
                ]
            ],
            "role" => $_SESSION['role']
        ];
        echo json_encode($data);
        exit();
    } else {
        $data = [
            'result' => [
                'status' => [
                    'statusCode' => "1",
                        'errorCode' => "100", 
                            'errorMessage' => "Invalid Login Credentials"
                    ]
                ],
                "sql"=> $sql
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