<?php
include('sql_loadchurch.php');

include('sql_connection.php');

if (isset($_POST['button_Search'])) {
  $form_search = $_POST['form_Search'];
  $form_Church = $_POST['form_Church'];
  if ($form_Church != "ALL") {
    $sql = "SELECT * FROM `members` WHERE (`member_LastName` LIKE '%$form_search%' OR `member_FirstName` LIKE '%$form_search%') AND `church_ID` = $form_Church ";
    $result_viewmember = mysqli_query($conn, $sql);
  }else {
    $sql = "SELECT * FROM `members` WHERE `member_LastName` LIKE '%$form_search%' OR `member_FirstName` LIKE '%$form_search%' ";
    $result_viewmember = mysqli_query($conn, $sql);
  }

}else {
  $sql = "SELECT * FROM `members`";
  $result_viewmember = mysqli_query($conn, $sql);
}
