<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($title)) {
                echo $title;
            } else {
                echo "SMS";
            } ?></title>
    <!-- Jquery CDN -->
    <script src="<?php echo base_url('jquery/jquery-3.6.0.min.js'); ?>"></script>
    <script src="<?php echo base_url('qr/qrcode.min.js'); ?>"></script>
    <!-- Bootstrap CDN -->
    <link href="<?php echo base_url('bootstrap5/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('bootstrap5/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Font Awesome-->
    <script src="https://kit.fontawesome.com/eeb684813e.js" crossorigin="anonymous"></script>
    <!-- SweetAlert For windows -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('images/app.ico'); ?>">

</head>

<body>
