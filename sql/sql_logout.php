<?php
session_start();
$_SESSION['user_Username'] = "";
$_SESSION['user_AccountType'] = "";
$_SESSION['church_ID'] = "";
header("Location: /index.php");
