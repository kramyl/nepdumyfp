<?php
include('sql/sql_loadchurch.php');
include('sql_connection.php');

$sql = "SELECT * FROM `members` WHERE `member_ID` = '$member_ID'";
$result = mysqli_query($conn, $sql);
