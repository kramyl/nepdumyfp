<?php
include('sql_connection.php');
$form_Username = "";

$errorMessage = "";
if (isset($_POST['login'])) {

  $form_Username = $_POST['form_Username'];
  $form_Password = $_POST['form_Password'];

  if ($form_Username != "") {
    if ($form_Password != "") {
      $select_sql = "SELECT * FROM `users` WHERE `user_UserName` = '$form_Username';";
      $result = mysqli_query($conn , $select_sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
          if ($row['user_Password'] == $form_Password) {
            // code...
            $_SESSION['user_Username'] = $form_Username;
            $_SESSION['user_AccountType'] = $row['user_AccountType'];
            header('Location: viewmembers.php');
          }
          else {
            $errorMessage = "Wrong password.";
          }
        }
      }else {
        $errorMessage = "User not exist.";
      }
    }else {
      $errorMessage = "Password required.";
    }
  }else {
    $errorMessage = "Username required.";
  }
}
