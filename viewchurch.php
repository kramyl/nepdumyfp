<?php include('layout/session.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>NEPDUMYFP</title>
    <?php include('layout/head.php'); ?>
  </head>
  <body>
    <!-- Page Title -->
    <?php $page_title = '<h4 class="main_title_text"><i class="fas fa-eye"></i> View Church</span></h4>'; ?>

    <!-- Sidebar selected -->
    <?php $page_current = 'churches'; ?>

    <?php include('layout/main_layout.php'); ?><!-- Layout Start -->
      <!--Main Contents STARTS HERE -->
      <form class="form_main border-bottom" method="post">
        <?php $church_ID = $_GET['token'];?>
        <?php include('sql/sql_viewchurch.php');?><!-- SQL -->

        <div class="form-row col-md-10 mx-auto">
          <div class="form-group col-md-12">
            <br>
          </div>

          <?php if (mysqli_num_rows($result) > 0) {

              while($row = mysqli_fetch_assoc($result)) {
            ?>
              <div class="form-group col-md-12">
                <h5>Church Information</h5>
                <hr>
              </div>
              <div class="form-inline col-md-12">
                <div class="col-md-3">
                  <strong><h7>Church Local Name: </h7></strong>
                </div>
                <div class="col-md-9">
                  <h7><?=$row['church_LocalName'] ?></h7>
                </div>
              </div>
              <div class="form-group col-md-12">
              </div>
              <div class="form-inline col-md-12">
                <div class="col-md-3">
                  <strong><h7>Full Address: </h7></strong>
                </div>
                <div class="col-md-9">
                  <h7><?=$row['church_Street'] . ", " . $row['church_Barangay'] . " " . $row['church_Town'] . " " .  $row['church_ZipCode']  . ", " . $row['church_Province']  ?></h7>
                </div>
              </div>
              <div class="form-group col-md-12">
              </div>
              <div class="form-group col-md-12">
                <hr>
              </div>
              <div class="form-group col-md-3 mx-auto">
                <a href="/viewchurches.php" class="btn Color_Red" name="save"><i class="fas fa-arrow-left"></i> Back</a>
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
