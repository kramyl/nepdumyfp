<?php
include('sql_connection.php');

if (isset($_POST['button_Search'])) {
  $form_search = $_POST['form_Search'];
  $sql = "SELECT * FROM `churches` WHERE `church_LocalName` LIKE '%$form_search%'";
  $result = mysqli_query($conn, $sql);
}else {
  $sql = "SELECT * FROM `churches`";
  $result = mysqli_query($conn, $sql);
}
