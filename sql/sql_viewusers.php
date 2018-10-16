<?php
include('sql/sql_loadchurch.php');
include('sql_connection.php');


if (isset($_POST['button_Search'])) {
  $form_search = $_POST['form_Search'];
  $sql = "SELECT * FROM `users` WHERE `user_LastName` LIKE '%$form_search%' OR `user_FirstName` LIKE '%$form_search%' OR `user_UserName` LIKE '%$form_search%'";
  $result = mysqli_query($conn, $sql);
}else {
  $sql = "SELECT * FROM `users`";
  $result = mysqli_query($conn, $sql);
}
