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

		$title = trim($_POST['addFooterMenuTitle']);
		$slNo = trim($_POST['addFooterMenuSlNo']);

		$checkSlNoExistsOrNot = checkSlNoExistsOrNot($conn, $slNo);

		if ($checkSlNoExistsOrNot > 0) {
			$data = array(
				'result' => array(
					'status' => array(
						'statusCode' => "1", 
						'errorCode' => "105",
						'errorMessage' => "Sl No. already exists",
					)
				)
			);
			echo json_encode($data);
			exit();
		}
    
		$submenuMenuItems = isset($_POST['subMenuItems']) ? json_decode($_POST['subMenuItems']) : [];
		// echo $submenuItems; exit();
		// echo var_dump($submenuItems); exit();

		$menuSql = "INSERT INTO `footer_menus` (`title`, `sl_no`, `created`, `orgCode`) VALUES ('$title', '$slNo', NOW(), '".$_SESSION['orgCode']."');";
		$menuResult = mysqli_query($conn, $menuSql);

		if ($menuResult) {
			$lastInsertedId = mysqli_insert_id($conn);
			if (count($submenuMenuItems) > 0) {
				for ($i=0; $i < count($submenuMenuItems); $i++) {

					$title = $submenuMenuItems[$i] -> title;
					$slug = $submenuMenuItems[$i] -> slug;

                    $submenuSql = "INSERT INTO `footer_sub_menus` (`footermenu_id`, `title`, `slug`, `created`, `orgCode`) VALUES ('$lastInsertedId', '$title', '$slug', NOW(), '".$_SESSION['orgCode']."')";
					error_log($submenuSql);

					$submenuSqlResult = mysqli_query($conn, $submenuSql);

					if (!$submenuSqlResult) {
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
				}
			}

			$data = [
				'result' => [
					'status' => [
						'statusCode' => "0",
						'sql' => $menuSql,
						'sql2' => $submenuSql

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
						'sql' => $menuSql,
						'sql2' => $icon,
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