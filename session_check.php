<?php
session_start();
if(empty($_SESSION['status'])){
    header('location: login.php');
}

$ses_id = $_SESSION['id'];
$ses_email = $_SESSION['email'];