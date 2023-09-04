<?php
	require '../assets/includes/checklogin.php';

	try {
		require_once '../assets/includes/config.php';
		$mainMenuId = $_POST['mainMenuId'];
		$data = [];
		$sql = "SELECT * FROM menus WHERE id = $mainMenuId  ORDER BY id DESC";
		$result = mysqli_query($conn, $sql);
		if ($result) {
            $menuDetails = [];
            $subMenuData = [];

            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    array_push($menuDetails, $rows);
                }

                $subMenusql = "SELECT * FROM sub_menus WHERE mainmenu_id='$mainMenuId' AND deleted IS NULL ";
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