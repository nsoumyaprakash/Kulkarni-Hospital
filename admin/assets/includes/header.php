<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
        $data = [
            'result' => [
                'status' => [
                    'statusCode' => "1", 
                    'errorCode' => "300", 
                    'errorMessage' => "Please login to continue!"
                ]
            ]
        ];
        header("location:../index.php?error=".base64_encode(json_encode($data)));
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin</title>

    <!-- Favicons -->
    <link href="../assets/img/logo.jpg" rel="icon">
    <!-- <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Plugins CSS Files -->
    <link href="../assets/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/jquery-ui/dist/themes/base/jquery-ui.min.css" rel="stylesheet">
    <link href="../assets/plugins/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../assets/plugins/quill/dist/quill.snow.css" rel="stylesheet">
    <link href="../assets/plugins/quill/dist/quill.bubble.css" rel="stylesheet">
    <link href="../assets/plugins/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/plugins/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="../assets/plugins/toastify-js/src/toastify.css" rel="stylesheet">
    <link href="../assets/plugins/chosen-js/chosen.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://unicons.iconscout.com/release/v3.0.3/css/line.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">

    <!-- Plugins JS Files -->
    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/plugins/jquery-ui/dist/jquery-ui.min.js"></script>
    <script src="../assets/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/quill/dist/quill.min.js"></script>
    <script src="../assets/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="../assets/plugins/toastify-js/src/toastify.js"></script>
    <script src="../assets/plugins/chosen-js/chosen.jquery.min.js"></script>
    <script src="../assets/plugins/jquery/dateFormat.js"></script>
    <script src="../js/utilityFunctions.js"></script>

    <!-- <script src="../assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script> -->


</head>

<body>
    <?php
        include "navbar.php";
        include "sidebar.php";
        include "modals.php";
    ?>