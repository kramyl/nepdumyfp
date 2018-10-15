<?php
include('sql_connection.php');
$sql = "SELECT * FROM `churches`";
$result = mysqli_query($conn, $sql);
