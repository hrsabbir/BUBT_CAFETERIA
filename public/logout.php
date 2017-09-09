<?php
/**
 * Created by PhpStorm.
 * User: Hanif
 * Date: 8/15/2017
 * Time: 9:11 PM
 */

session_start();
session_destroy();
header('Location: index.php');
?>