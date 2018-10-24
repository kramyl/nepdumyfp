<?php
include('sql/sql_loadchurch.php');
include('sql_connection.php');


$sql = "SELECT * FROM `users` WHERE `user_UserName` = '$user_Username'";
$result = mysqli_query($conn, $sql);
