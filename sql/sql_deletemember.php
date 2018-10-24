<?php

include('sql_connection.php');

$member_ID = $_GET['token'];

$delete_sql = "DELETE FROM members WHERE member_ID = '$member_ID';";

if (mysqli_query($conn,$delete_sql)) {
  header("Location: ../viewmembers.php");
}

mysqli_close($conn);
