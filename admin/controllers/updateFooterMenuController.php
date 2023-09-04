<?php
	require '../assets/includes/checklogin.php';
	
	function checkSlNoExistsOrNot($conn, $slNo){
		$sql = "SELECT COUNT(id) AS COUNTS FROM footer_menus WHERE sl_no = '$slNo' ";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				if (mysqli_num_rows($result) > 0) {
					while ($rows = mysqli_fetch_assoc($result)) {
						$counts = $rows['COUNTS'];
					}
				} else {
					$counts = 0;
				}
				
			} else {
				$counts = -1;
			}
			return $counts;
	}

	try {
        include "../assets/includes/utility_functions.php";
		require_once '../assets/includes/config.php';

        $footerMenuId = $_POST['editFooterId'];
		$title = trim($_POST['editFooterMenuTitle']);
		$slNo = $_POST['editFooterMenuSlNo'];

		$checkSlNoExistsOrNot = checkSlNoExistsOrNot($conn, $slNo);

		// Sub Menu
        $subMenuData = isset($_POST['subMenuEditItems']) ? json_decode($_POST['subMenuEditItems']) : [];

		// First get all submenu correspond to this  id
		$editedSubMenuIds = [];
		foreach ($subMenuData as $item) {
			$editedSubMenuIds[] = $item -> id;
		}

		$existingSubMenuIds = [];
		$getSubmenuSql = mysqli_query($conn, "SELECT id FROM `footer_sub_menus` WHERE footermenu_id='$footerMenuId' AND deleted IS NULL ");
		if ($getSubmenuSql) {
			if (mysqli_num_rows($getSubmenuSql) > 0) {
				while ($rows = mysqli_fetch_assoc($getSubmenuSql)) {
					$existingSubMenuIds[] = $rows['id'];
				}
			}
		}else{
			$data = [
				'result' => [
					'status' => [
						'statusCode' => "1", 
						'errorCode' => "500",
						'errorMessage' => "INTERNAL ERROR"
					]
				]
			];
			echo json_encode($data);
			exit();
		}
		
		// Deleting the items which is not present in the editdata and present in database with correspond to this  id
		if (count($existingSubMenuIds) > 0) {
			for ($i=0; $i < count($existingSubMenuIds); $i++) {
				if (!in_array($existingSubMenuIds[$i], $editedSubMenuIds)) {
					$deleteSubmenuSql = "UPDATE `footer_sub_menus` SET `deleted` = NOW() WHERE `footer_sub_menus`.`id` = '".$existingSubMenuIds[$i]."' AND `footer_sub_menus`.`footermenu_id` = '$footerMenuId' AND `footer_sub_menus`.`orgCode` = '".$_SESSION['orgCode']."'";
				}
				$deleteSubmenuSqlResult = mysqli_query($conn, $deleteSubmenuSql);

				if ($deleteSubmenuSql != null && !$deleteSubmenuSqlResult) {
					$data = [
						'result' => [
							'status' => [
								'statusCode' => "1", 
								'errorCode' => mysqli_errno($conn),
								'errorMessage' => mysqli_error($conn),
							]
						],
						"sql" => $FeatureSql
					];
					echo json_encode($data);
					exit();
				}
			}
		}

		if (count($subMenuData) > 0) {
			for ($i=0; $i < count($subMenuData); $i++) {
				$subMenuId = $subMenuData[$i] -> id;
				$subMenutitle = $subMenuData[$i] -> title;
				$subMenuSlug = $subMenuData[$i] -> slug;
				
				if (in_array($subMenuId, $existingSubMenuIds)) {
					$FeatureSql = "UPDATE `footer_sub_menus` SET `title` = '$subMenutitle', `slug` = '$subMenuSlug', `updated` = NOW() WHERE `footer_sub_menus`.`id` = '$subMenuId' AND `footer_sub_menus`.`footermenu_id` = '$footerMenuId' AND `footer_sub_menus`.`orgCode` = '".$_SESSION['orgCode']."'";
				}else if ($subMenuId == "") {
					$FeatureSql = "INSERT INTO `footer_sub_menus` (`footermenu_id`, `title`, `slug`, `updated`, `orgCode`) VALUES ('$footerMenuId', '$subMenutitle', '$subMenuSlug', NOW(), '".$_SESSION['orgCode']."')";
				}
				
				$FeatureSqlResult = mysqli_query($conn, $FeatureSql);

				if ($FeatureSql != null && !$FeatureSqlResult) {
					$data = [
						'result' => [
							'status' => [
								'statusCode' => "1", 
								'errorCode' => mysqli_errno($conn),
								'errorMessage' => mysqli_error($conn),
							]
						],
						"sql1" => $FeatureSql
					];
					echo json_encode($data);
					exit();
				}
			}
		}
		if ($checkSlNoExistsOrNot > 0) {
			$sql = "UPDATE `footer_menus` SET  `title` = '$title', `updated` = NOW() WHERE id = '$footerMenuId' ";
		}else {
        	$sql = "UPDATE `footer_menus` SET  `title` = '$title', `sl_no` = '$slNo', `updated` = NOW() WHERE id = '$footerMenuId' ";
		}
		$result = mysqli_query($conn, $sql);

		if ($result) {
			$data = [
				'result' => [
					'status' => [
						'statusCode' => "0",
						'sql' => $sql
					]
				]
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