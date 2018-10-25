<?php
include('sql_connection.php');

$church_LocalName = $_GET['token'];
$sql = "SELECT * FROM `churches` WHERE `church_LocalName` = '$church_LocalName'";
$result = mysqli_query($conn, $sql);
