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
  $form_ContactNumber = $_POST['form_ContactNumber'];

  $sql = "UPDATE `churches` SET
  `church_Street` = '$form_Street',
  `church_Barangay` = '$form_Barangay',
  `church_Town` = '$form_Town',
  `church_Province` = '$form_Province',
  `church_ZipCode` = '$form_ZipCode',
  `church_LocalPastor` = '$form_LocalPastor',
  `Church_ContactNumber` = '$form_ContactNumber'
   WHERE `church_LocalName` = '$form_ChurchName';";

  if (mysqli_query($conn, $sql)) {
      $_SESSION['successMessage'] = "Local Church [" . $form_ChurchName . "] was succesfully updated.";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
}
