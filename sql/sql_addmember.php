<?php
$pageType="addmember";
include('sql/sql_loadchurches.php');

include('sql_connection.php');

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

  $sql = "INSERT INTO `members`
          (`member_FirstName`, `member_MiddleName`, `member_LastName`, `member_Suffix`, `member_Gender`, `member_BirthDate`, `member_Age`, `member_HouseNo`, `member_Street`, `member_Barangay`, `member_Town`, `member_Province`, `member_ContactNo`, `member_EmailAddress`, `member_FinishedConfirmationClass`, `church_ID`)
          VALUES
          ('$form_FirstName', '$form_MiddleName', '$form_LastName', '$form_Suffix', '$form_Gender', '$form_Birthday', '$form_Age', '$form_HouseNo', '$form_Street', '$form_Barangay', '$form_Town', '$form_Province', '$form_ContactNumber', '$form_EmailAddress', '$form_FinishedConfirmationClass', '$form_Church');";

  if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}
