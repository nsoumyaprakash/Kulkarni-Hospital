<?php
	require '../assets/includes/checklogin.php';

	function getSubMenu($conn, $mainMenuId){
		$sql = mysqli_query($conn,"SELECT * FROM footer_sub_menus WHERE footermenu_id='$mainMenuId' AND deleted IS NULL  ORDER BY id DESC;");
		$data = [];
		if ($sql) {
			if (mysqli_num_rows($sql) > 0) {
				while ($rows = mysqli_fetch_assoc($sql)) {
					array_push($data, $rows);
				}
			}
		}
		return $data;
	}
	try {
		require_once '../assets/includes/config.php';
		$subMenuData = [];
        $data = [];
        $fromDate = $_POST['fromDate'];
		$toDate = $_POST['toDate'];
        $status = $_POST['status'];

        if ($fromDate != "" && $toDate != "") {
            $fromDate = date('Y-m-d', strtotime($fromDate));
            $toDate = date('Y-m-d', strtotime($toDate));

            $sql = "SELECT * FROM footer_menus WHERE created <= '$toDate 23:59:59' AND created >= '$fromDate 00:00:00' AND status = '$status' AND deleted IS NULL  ORDER BY id DESC";
		} else {
			$sql = "SELECT * FROM footer_menus WHERE deleted IS NULL  ORDER BY id DESC";
		}
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);
		if ($count > 0) {
			while ($rows = mysqli_fetch_assoc($result)) {
				// array_push($data, $rows);
				$data[] = array(
					'id' => $rows['id'],
					'title' => $rows['title'],
					'subMenuData' => getSubMenu($conn, $rows['id']),
					'sql' => $sql
				);
			}
			
			$mainData = [
				'result' => [
					'status' => [
						'statusCode' => "0"
                    ]
                ],
				'menuDetails' => $data,
				'sql' => $sql
            ];
			echo json_encode($mainData);
			exit();
		} else {
			$data = [
				'result' => [
					'status' => [
						'statusCode' => "1", 
						'errorCode' => "300",
						'errorMessage' => "DATA NOT AVAILABLE",
						'sql' => $sql

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