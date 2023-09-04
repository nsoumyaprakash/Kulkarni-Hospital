<?php
	require '../assets/includes/checklogin.php';

	try {
		require_once '../assets/includes/config.php';
		$footerMenuId = $_POST['footerMenuId'];
		$data = [];
		$sql = "SELECT * FROM footer_menus WHERE id = '$footerMenuId'  ORDER BY id DESC";
		$result = mysqli_query($conn, $sql);
		if ($result) {
            $menuDetails = [];
            $subMenuData = [];

            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    array_push($menuDetails, $rows);
                }

                $subMenusql = "SELECT * FROM footer_sub_menus WHERE footermenu_id='$footerMenuId' AND deleted IS NULL ";
		        $subMenuResult = mysqli_query($conn, $subMenusql);
                if ($subMenuResult) {
                    if (mysqli_num_rows($subMenuResult) > 0) {
                        while ($rows = mysqli_fetch_assoc($subMenuResult)) {
                            $item = [
                                "id" => $rows['id'],
                                "slug" => $rows['slug'],
                                "title" => $rows['title']
                            ];
                            array_push($subMenuData, $item);
                        }
                    }
                }
            }

			$data = [
				'result' => [
					'status' => [
						'statusCode' => "0"
					]
                ],
                "menuDetails"=> $menuDetails,
                "subMenuData"=> $subMenuData
			];
			echo json_encode($data);
			exit();
		} else {
			$data = [
				'result' => [
					'status' => [
						'statusCode' => "1", 
						'errorCode' => mysqli_errno($conn),
						'errorMessage' => mysqli_error($conn),
					]
				]
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