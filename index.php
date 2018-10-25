<?php
session_start();
if (!isset($_SESSION['user_Username'])) {
  $_SESSION['user_Username'] = "";
  $_SESSION['user_AccountType'] = "";
  $_SESSION['church_ID'] = "";
  $_SESSION['successMessage']= "";
  $_SESSION['logged'] = "0";
}

if ($_SESSION['user_Username'] != "" && $_SESSION['logged'] == "0") {
  header("Location: /viewmembers.php");
}
include('sql/sql_login.php');
?> <!-- sql -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>NEPDUMYFP</title>
    <?php include('layout/head.php'); ?>
    <link rel="stylesheet" href="/css/custom/login.css">
  </head>
  <body>
    <div class="mx-auto container border border-bottom shadow-sm p-3 bg-white rounded">
      <form class="form-group col-lg-12" width="300px" method="post">
        <div class="form-group">
          <div class="float-left">
            <img src="/img/main_logo.png">
          </div>
          <div class="float-left">
            <br>
            <h3>The</h3>
            <h3>United Methodist</h3>
            <h3>Church</h3>
            <br>
            <br>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
          <?php include('sql/sql_login.php'); ?> <!-- sql -->
          <?php if ($errorMessage != "") {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert" >
              <label><?=$errorMessage ?></label>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
            $errorMessage = "";
          } ?>
        </div>
        <div class="form-group">
          <input type="text" class="form-control"  placeholder="Username" name="form_Username" value="<?= $form_Username ?>">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Password" name="form_Password">
        </div>
        <button type="submit" class="btn Color_Blue btn-block" name="login"><i class="fas fa-sign-in-alt"></i> Login</button>
        <br>
      </form>
    </div>
  </body>
  <footer>
    <?php include('layout/foot.php'); ?>
  </footer>
</html>
