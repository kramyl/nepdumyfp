<?php
include('sql/sql_loadchurch.php');
include('sql_connection.php');

$member_ID = $_GET['token'];
$sql = "SELECT * FROM `members` WHERE `member_ID` = '$member_ID'";
$result_viewmember = mysqli_query($conn, $sql);
