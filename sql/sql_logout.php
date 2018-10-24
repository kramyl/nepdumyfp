<?php
session_start();
$_SESSION['user_Username'] = "";
$_SESSION['user_AccountType'] = "";
header("Location: /index.php");
