<?php
include('sql_connection.php');

if (isset($_POST['save'])) {
  $form_ChurchName = $_POST['form_ChurchName'];
  $form_Street = $_POST['form_Street'];
  $form_Barangay = $_POST['form_Barangay'];
  $form_Town = $_POST['form_Town'];
  $form_Province = $_POST['form_Province'];
  $form_ZipCode = $_POST['form_ZipCode'];

  $sql = "INSERT INTO `churches` (`church_LocalName`, `church_Street`, `church_Barangay`, `church_Town`, `church_Province`, `church_ZipCode`)
          VALUES ('$form_ChurchName', '$form_Street', '$form_Barangay', '$form_Town', '$form_Province', '$form_ZipCode');";

  if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
  } else {
      //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}
