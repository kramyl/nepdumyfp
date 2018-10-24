<?php
  session_start();

  if (!isset($_SESSION['user_Username'])) {
    $_SESSION['user_Username'] = "";
    $_SESSION['user_AccountType'] = "";
  }
  if ($_SESSION['user_Username'] == "") {
    header("Location: /index.php");
  }
