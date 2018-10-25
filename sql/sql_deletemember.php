<?php
session_start();
include('sql_connection.php');

$member_ID = $_GET['token'];

$sql = "SELECT * FROM `members` WHERE `member_ID` = '$member_ID'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $form_FirstName = $row['member_FirstName'] ;
    $form_MiddleName = $row['member_MiddleName'];
    $form_LastName = $row['member_LastName'];
    $form_Suffix = $row['member_Suffix'];

    $delete_sql = "DELETE FROM members WHERE member_ID = '$member_ID';";

    if (mysqli_query($conn, $delete_sql)) {
      $_SESSION['successMessage'] =  "Member [" . $form_FirstName . " " . $form_MiddleName . " " . $form_LastName . " " . $form_Suffix . "] was succesfully deleted.";
      header("Location: ../viewmembers.php");
    }

  }
}

mysqli_close($conn);
