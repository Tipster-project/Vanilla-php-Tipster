<?php 
include 'includes/db_connect.php';
session_start();

$T_name = $_SESSION['tournament_name'];
$T_text = $_SESSION['tournament_text']; 
$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO tournament"

 ?>