<?php
$successMessage = "";
if (isset($_POST['update'])) {
  include('sql_connection.php');
  $form_Username = $_POST['form_Username'];

  $form_FirstName = $_POST['form_FirstName'];
  $form_MiddleName = $_POST['form_MiddleName'];
  $form_LastName = $_POST['form_LastName'];
  $form_Suffix = $_POST['form_Suffix'];
  $form_Password = $_POST['form_Password'];
  if ($form_Password != "") {
    $sql = "UPDATE `users` SET
    `user_FirstName` = '$form_FirstName',
    `user_MiddleName` = '$form_MiddleName',
    `user_LastName` = '$form_LastName',
    `user_Suffix` = '$form_Suffix',
    `user_Password` = '$form_Password'
    WHERE `user_UserName` = '$form_Username';";
  }else {
    $sql = "UPDATE `users` SET
    `user_FirstName` = '$form_FirstName',
    `user_MiddleName` = '$form_MiddleName',
    `user_LastName` = '$form_LastName',
    `user_Suffix` = '$form_Suffix'
    WHERE `user_UserName` = '$form_Username';";
  }



  if (mysqli_query($conn, $sql)) {
      $successMessage = "User [" . $form_Username . "] was succesfully updated.";
  } else {
      //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}
