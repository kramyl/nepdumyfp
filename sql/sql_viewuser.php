<?php
include('sql/sql_loadchurch.php');
include('sql_connection.php');
$sql = "SELECT * FROM `users`";
$result = mysqli_query($conn, $sql);
