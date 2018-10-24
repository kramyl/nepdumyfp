<?php
include('sql/sql_loadchurch.php');
include('sql_connection.php');

$user_Username = $_GET['token'];
$sql = "SELECT * FROM `users` WHERE `user_UserName` = '$user_Username'";
$result_viewuser = mysqli_query($conn, $sql);
