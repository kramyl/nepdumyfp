<?php
session_start();
include('sql_connection.php');

$church_LocalName = $_GET['token'];

$delete_sql = "DELETE FROM churches WHERE church_ID = '$church_LocalName';";

if (mysqli_query($conn,$delete_sql)) {
  $_SESSION['successMessage'] =  "Local Church [" . $church_LocalName . "] was succesfully deleted.";
  header("Location: ../viewchurches.php");
}

mysqli_close($conn);
