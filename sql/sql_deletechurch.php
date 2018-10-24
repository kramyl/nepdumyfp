<?php

include('sql_connection.php');

$church_ID = $_GET['token'];

$delete_sql = "DELETE FROM churches WHERE church_ID = '$church_ID';";

if (mysqli_query($conn,$delete_sql)) {
  header("Location: ../viewchurches.php");
}

mysqli_close($conn);
