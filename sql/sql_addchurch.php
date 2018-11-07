<?php
include('sql_connection.php');
$successMessage = "";
if (isset($_POST['save'])) {
  $form_ChurchName = $_POST['form_ChurchName'];
  $form_Street = $_POST['form_Street'];
  $form_Barangay = $_POST['form_Barangay'];
  $form_Town = $_POST['form_Town'];
  $form_Province = $_POST['form_Province'];
  $form_ZipCode = $_POST['form_ZipCode'];
  $form_LocalPastor = $_POST['form_LocalPastor'];

  $sql = "INSERT INTO `churches` (`church_LocalName`, `church_Street`, `church_Barangay`, `church_Town`, `church_Province`, `church_ZipCode`, `church_LocalPastor`)
          VALUES ('$form_ChurchName', '$form_Street', '$form_Barangay', '$form_Town', '$form_Province', '$form_ZipCode' , '$form_LocalPastor');";

  if (mysqli_query($conn, $sql)) {
      $_SESSION['successMessage'] = "Local Church [" . $form_ChurchName . "] was succesfully created.";
  } else {
      //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}
