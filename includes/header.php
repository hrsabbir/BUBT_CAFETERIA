<!doctype html>
<html class="no-js" lang="">
<head>
    <?php require_once '../includes/db.php'?>
    <?php require_once '../includes/functions.php' ?>
    <?php loginCheck();?>
    <?php registerCheck();?>
    <?php $flag=loggedIn()?1:0;?>
    <?php orderItems();?>
    <?php itemsUpdate();?>
    <?php confirmOrder();?>
    <?php orderCanceled();?>
    <?php orderPaid()?>
    <?php updateItemCheck()?>
    <?php deleteItemCheck()?>
    <?php contactusCheck()?>
    <title>Cafeteria Management System</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

</head>
<body>
<div class="main">
<?php include_once 'navbar.php'?>
<?php include_once 'carousel.php'?>
