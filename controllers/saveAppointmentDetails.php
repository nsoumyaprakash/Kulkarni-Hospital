<?php
    try {
        require_once '../assets/utils/_dbconfig.php';
        require_once '../assets/utils/_phputils.php';
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $orgCode = $_POST['apptHospital'];
            $deptId = $_POST['apptDepartment'];
            $docId = $_POST['apptDoctor'];
            $apptDateTime = isset($_POST['apptDateTime']) ? dateTimeFormater($_POST['apptDateTime'], "Y-m-d H:i:s") : NULL;
            $apptPatientName = $_POST['apptPatientName'];
            $apptPatientEmail = $_POST['apptPatientEmail'];
            $apptPatientPhone = $_POST['apptPatientPhone'];
            $apptPatientAddress = $_POST['apptPatientAddress'];
            $apptPatientMessage = $_POST['apptPatientMessage'];
            
            $sql = "INSERT INTO `appointments` (`org_code`, `dept_id`, `doc_id`, `appt_datetime`, `name`, `email`, `phone`, `address`, `message`, `created`) VALUES ('$orgCode', '$deptId', '$docId', '$apptDateTime', '$apptPatientName', '$apptPatientEmail', '$apptPatientPhone', '$apptPatientAddress', '$apptPatientMessage', current_timestamp())";
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
                "message" => "YOUR APPOINTMENT BOOKED SUCCESSFULLY!"
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