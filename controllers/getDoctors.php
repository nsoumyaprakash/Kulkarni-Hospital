<?php
	try {
		require_once '../assets/utils/_dbconfig.php';
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $deptId = $_POST['deptId'];
            $resData = [];
            $sql = "SELECT `id`, `name` FROM `doctors` WHERE `dept_id`='$deptId' AND `deleted` IS NULL ORDER BY `name` ASC";
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
            $resData = [];
            $sql = "SELECT `id`, `img`, `name`, `speciality`, `description` FROM `doctors` WHERE `deleted` IS NULL ORDER BY `name` ASC";
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