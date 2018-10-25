<?php
$pageType="addmember";

include('sql_connection.php');
$successMessage ="";
$member_ID = $_GET['token'];
if (isset($_POST['save'])) {
  $form_FirstName = $_POST['form_FirstName'];
  $form_MiddleName = $_POST['form_MiddleName'];
  $form_LastName = $_POST['form_LastName'];
  $form_Suffix = $_POST['form_Suffix'];
  $form_Gender = $_POST['form_Gender'];
  $form_Birthday = $_POST['form_Birthday'];
  $form_Age = $_POST['form_Age'];
  $form_HouseNo = $_POST['form_HouseNo'];
  $form_Street = $_POST['form_Street'];
  $form_Barangay = $_POST['form_Barangay'];
  $form_Town = $_POST['form_Town'];
  $form_Province = $_POST['form_Province'];
  $form_ContactNumber = $_POST['form_ContactNumber'];
  $form_EmailAddress = $_POST['form_EmailAddress'];
  $form_FinishedConfirmationClass = $_POST['form_FinishedConfirmationClass'];
  $form_Church = $_POST['form_Church'];

  $sql = "UPDATE `members` SET
  `member_FirstName` = '$form_FirstName',
  `member_MiddleName` = '$form_MiddleName',
  `member_LastName` = '$form_LastName',
  `member_Suffix` = '$form_Suffix',
  `member_Gender` = '$form_Gender',
  `member_BirthDate` = '$form_Birthday',
  `member_Age` = '$form_Birthday',
  `member_HouseNo` = '$form_HouseNo',
  `member_Street` = '$form_Street',
  `member_Barangay` = '$form_Barangay',
  `member_Town` = '$form_Town',
  `member_Province` = '$form_Province',
  `member_ContactNo` = '$form_ContactNumber',
  `member_EmailAddress` = '$form_EmailAddress',
  `member_FinishedConfirmationClass` = '$form_FinishedConfirmationClass',
  `church_ID` = '$form_Church'
  WHERE `member_ID` = '$member_ID';";

  if (mysqli_query($conn, $sql)) {
      $successMessage = "Member [" . $form_FirstName . " " . $form_MiddleName . " " . $form_LastName . " " . $form_Suffix . "] was succesfully updated.";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}
