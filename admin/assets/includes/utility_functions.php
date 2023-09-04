<?php
    function handleFile($imageFile, $uploadPath) {
        $fileTmpName = $imageFile["tmp_name"];
        $fileName = $imageFile["name"];
        $explodedArray = explode(".", $fileName);
        $fileExt = strtolower(end($explodedArray));
        $fileSize = $imageFile["size"];
        $allowedFileType = ["png", "gif", "jpeg", "jpg"];
		// $uploadPath = "../assets/img/uplaods/";
        if (in_array($fileExt, $allowedFileType)) {
            $newFileName = str_replace(" ", "_", $fileName);
            $newFileName = date("YmdHis")."_".$newFileName;
    
            if (file_exists($uploadPath.$newFileName)) {
                $data = [
                    "result" => [
                        "status" => [
                            "statusCode" => "1",
                            "errorCode" => "105",
                            "errorMessage" => "File Already Exists Not Allowed",
                        ],
                    ],
                ];
                echo json_encode($data);
                exit();
            }
    
            if ($fileSize > 50000000) {
                $data = [
                    "result" => [
                        "status" => [
                            "statusCode" => "1",
                            "errorCode" => "105",
                            "errorMessage" => "File Size Should Be Less Than 5000 kb",
                        ],
                    ],
                ];
                echo json_encode($data);
                exit();
            }
    
           move_uploaded_file($fileTmpName, $uploadPath.$newFileName);
    
    
            return $newFileName;
        } 
    }
?>