<?php
	require '../assets/includes/checklogin.php';

	try {
		require_once '../assets/includes/config.php';
		$fromDate = date('Y-m-d');
		$toDate = date('Y-m-d');
        
		$totalEnquiries = "SELECT COUNT(id) as tot_enquiries FROM inquiryinfo WHERE created  >= '$fromDate 00:00:00' AND created <= '$toDate 23:59:59' ";
		
		$tot_enquiries = 0; 
        
		$result2 = mysqli_query($conn, $totalEnquiries);
		while($rows2 = mysqli_fetch_assoc($result2))
		{
			$tot_enquiries = $rows2['tot_enquiries'];
		}

		echo json_encode(
			array(
				'result' => array(
					'status' => array(
						'statusCode' => "0"
					)
				),
				"sql" => $totalEnquiries,
				"tot_enquiries" => $tot_enquiries,
				'from' => $fromDate,
				'to' => $toDate
			)
		);

		exit();
	} catch (Exception $e) {
		$data = array(
			'result' => array(
				'status' => array(
					'statusCode' => "1", 
					'errorCode' => $e->getCode(), 
					'errorLine' => $e->getLine(), 
					'errorMessage' => $e->getMessage(),
					'errorFile' => $e->getFile()
				)
			)
		);
		echo json_encode($data);
		exit();
	}
?>