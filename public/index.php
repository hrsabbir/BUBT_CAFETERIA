<?php session_start();?>
<?php include_once '../includes/header.php'?>
<?php $user_type=="admin"?include_once '../includes/admin.php':include_once '../includes/clients.php'?>
<?php include_once '../includes/footer.php'?>





