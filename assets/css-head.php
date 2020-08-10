<?php

$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[0];

    if($url){
        ?>
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
        <link rel="stylesheet" href="../assets/css/Brands.css">
        <link rel="stylesheet" href="../assets/css/Navigation-with-Button.css">
        <link rel="stylesheet" href="../assets/css/Pretty-Footer.css">
        <link rel="stylesheet" href="../assets/css/styles.css">
        <script src="../assets/js/nprogress.js"></script>
        <link rel="stylesheet" type="text/css" href="../assets/css/nprogress.css" />
<?php
    }
    else{
        ?>
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
        <link rel="stylesheet" href="assets/css/Brands.css">
        <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
        <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <script src="assets/js/nprogress.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/css/nprogress.css" />
<?php
    }
?>
