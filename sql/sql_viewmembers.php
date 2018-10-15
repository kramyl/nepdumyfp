<?php
include('sql/sql_loadchurch.php');
include('sql_connection.php');
$sql = "SELECT * FROM `members`";
$result = mysqli_query($conn, $sql);
