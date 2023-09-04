<?php
	require '../assets/includes/checklogin.php';

	require_once '../assets/includes/config.php';
	$query = "SELECT * FROM icons GROUP BY icon_class";
    $result = mysqli_query($conn, $query);

    $options = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $option = [
            "value" => $row['id'],
            "text" => $row['icon_class']
        ];
        $options[] = $option;
    }

    // Convert options array to JSON
    $optionsJson = json_encode($options);

    // Set the response headers
    header('Content-Type: application/json');

    // Return the JSON response
    echo $optionsJson;
?>