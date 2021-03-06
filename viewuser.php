<?php include('layout/session.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>NEPDUMYFP</title>
    <?php include('layout/head.php'); ?>
  </head>
  <body>

    <?php
      if (isset($_GET['frmeliforp'])) {
        //Page Title
        $page_title = '<h4 class="main_title_text"><i class="fas fa-eye"></i> My Account</span></h4>';
        //Sidebar selected
        if ($_SESSION['user_AccountType'] == "SuperAdmin") {
          // code...
          $page_current = 'users';
        }else {
          $page_current = 'members';
        }
      }else {
        //Page Title
        $page_title = '<h4 class="main_title_text"><i class="fas fa-eye"></i> View User</span></h4>';
        //Sidebar selected
        $page_current = 'users';
      }
     ?>

    <?php include('layout/main_layout.php'); ?><!-- Layout Start -->
      <!--Main Contents STARTS HERE -->
      <form class="form_main border-bottom" method="post">

        <?php include('sql/sql_viewuser.php');?><!-- SQL -->

        <div class="form-row col-md-10 mx-auto">
          <div class="form-group col-md-12">
            <br>
          </div>

          <?php if (mysqli_num_rows($result_viewuser) > 0) {

              while($row = mysqli_fetch_assoc($result_viewuser)) {
                $user_Suffix = "";
                if ($row['user_Suffix'] != "") {
                  $user_Suffix = ", " . $row['user_Suffix'];
                }
            ?>
              <div class="form-group col-md-12">
                <h5>Account Information</h5>
                <hr>
              </div>
              <div class="form-inline col-md-12">
                <div class="col-md-3">
                  <strong><h7>Username: </h7></strong>
                </div>
                <div class="col-md-9">
                  <h7><?= $row['user_UserName'] ?></h7>
                </div>
              </div>
              <div class="form-group col-md-12">
              </div>
              <div class="form-inline col-md-12">
                <div class="col-md-3">
                  <strong><h7>Name: </h7></strong>
                </div>
                <div class="col-md-9">
                  <h7><?= $row['user_LastName'] . ", " . $row['user_FirstName'] . " " . $row['user_MiddleName'] . $user_Suffix?></h7>
                </div>
              </div>
              <div class="form-group col-md-12">
              </div>
              <div class="form-inline col-md-12">
                <div class="col-md-3">
                  <strong><h7>Local Church: </h7></strong>
                </div>
                <div class="col-md-9">
                  <h7><?= DisplayChurchLocalName($row['church_ID']); ?></h7>
                </div>
              </div>
              <div class="form-group col-md-12">
              </div>
              <div class="form-group col-md-12">
                <hr>
              </div>
              <div class="form-group col-md-3 mx-auto">
                <?php if ($_SESSION['user_AccountType'] == "Admin") {
                  ?>
                    <a href="/viewmembers.php" class="btn Color_Red" name="save"><i class="fas fa-arrow-left"></i> Back</a>
                  <?php
                  if (isset($_GET['frmeliforp'])) {
                    ?>
                    <a class="btn Color_Orange" href="updateuser.php?token=<?=$row['user_UserName'] ?>&frmeliforp=ZX0-33FFGX"><i class="fas fa-edit"></i> Update</a>
                    <?php
                  }
                }
                else {
                  ?>
                    <a href="/viewusers.php" class="btn Color_Red" name="save"><i class="fas fa-arrow-left"></i> Back</a>
                  <?php
                  if (isset($_GET['frmeliforp'])) {
                    ?>
                    <a class="btn Color_Orange" href="updateuser.php?token=<?=$row['user_UserName'] ?>&frmeliforp=ZX0-33FFGX"><i class="fas fa-edit"></i> Update</a>
                    <?php
                  }
                } ?>

              </div>
              <div class="form-group col-md-12">
                <br>
              </div>

        <?php }
          }
         ?>
        </div>
      </form>
      <!--Main Contents ENDS HERE -->
    <?php include('layout/naviagation_mainbarend.php'); ?><!-- Layout End -->

  </body>
  <footer>
    <?php include('layout/foot.php'); ?>
  </footer>
</html>
