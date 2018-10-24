<?php
session_start();
include('sql_connection.php');

$username = $_GET['token'];

$delete_sql = "DELETE FROM users WHERE user_UserName = '$username';";

if (mysqli_query($conn,$delete_sql)) {
  $_SESSION['successMessage'] =  "User [". $username . "] was successfully deleted.";
  header("Location: ../viewusers.php");
}

mysqli_close($conn);
