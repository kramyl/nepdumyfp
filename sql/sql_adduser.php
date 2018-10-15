<?php
  $pageType="adduser";
include('sql/sql_loadchurches.php');

include('sql_connection.php');

if (isset($_POST['save'])) {
  $form_Username = $_POST['form_Username'];
  $form_Password = $_POST['form_Password'];
  $form_FirstName = $_POST['form_FirstName'];
  $form_MiddleName = $_POST['form_MiddleName'];
  $form_LastName = $_POST['form_LastName'];
  $form_Suffix = $_POST['form_Suffix'];
  $form_AccountType = "Admin";
  $form_Church = $_POST['form_Church'];

  $sql = "INSERT INTO `users` (`user_FirstName`, `user_MiddleName`, `user_LastName`, `user_Suffix`, `user_UserName`, `user_Password`, `user_AccountType`, `church_ID`)
          VALUES ('$form_FirstName', '$form_MiddleName', '$form_LastName', '$form_Suffix', '$form_Username', '$form_Password', '$form_AccountType', '$form_Church');";

  if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
  } else {
      //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}
