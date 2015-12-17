<?php
include 'db_connect.php';
session_start();
//Finlir med isset knapp osv behöver kirras.
$user_id = $_SESSION["user_id"];
$tournament_id = $_POST['tournament_id'];
$no_goal_set = null;



$db_connect->close();
?>