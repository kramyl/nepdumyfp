<?php
include('sql/sql_loadchurch.php');
include('sql_connection.php');

$sql = "SELECT * FROM `churches` WHERE `church_ID` = '$church_ID'";
$result = mysqli_query($conn, $sql);
