<?php
  session_start();

  if (!isset($_SESSION['user_Username'])) {
    $_SESSION['user_Username'] = "";
    $_SESSION['user_AccountType'] = "";
    $_SESSION['church_ID'] = "";
  }
  if ($_SESSION['user_Username'] == "") {
    header("Location: /index.php");
  }
