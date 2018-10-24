<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>NEPDUMYFP</title>
    <?php include('layout/head.php'); ?>
  </head>
  <body>
    <!-- Page Title -->
    <?php $page_title = '<h4 class="main_title_text"><i class="fas fa-eye"></i> View Member</span></h4>'; ?>

    <!-- Sidebar selected -->
    <?php $page_current = 'members'; ?>

    <?php include('layout/main_layout.php'); ?><!-- Layout Start -->
      <!--Main Contents STARTS HERE -->
      <form class="form_main border-bottom" method="post">
        <?php $member_ID = $_GET['token'];?>
        <?php include('sql/sql_viewmember.php');?><!-- SQL -->

        <div class="form-row col-md-10 mx-auto">
          <div class="form-group col-md-12">
            <br>
          </div>

          <?php if (mysqli_num_rows($result) > 0) {

              while($row = mysqli_fetch_assoc($result)) {
                $member_Suffix = "";
                if ($row['member_Suffix'] != "") {
                  $member_Suffix = ", " . $row['member_Suffix'];
                }
            ?>
              <div class="form-group col-md-12">
                <h5>Member Information</h5>
                <hr>
              </div>
              <div class="form-inline col-md-12">
                <div class="col-md-3">
                  <strong><h7>Name: </h7></strong>
                </div>
                <div class="col-md-9">
                  <h7><?=$row['member_LastName'] . ", " . $row['member_FirstName'] . " " . $row['member_MiddleName'] . $member_Suffix ?></h7>
                </div>
              </div>
              <div class="form-group col-md-12">
              </div>
              <div class="form-inline col-md-12">
                <div class="col-md-3">
                  <strong><h7>Gender: </h7></strong>
                </div>
                <div class="col-md-9">
                  <h7><?=$row['member_Gender'] ?></h7>
                </div>
              </div>
              <div class="form-group col-md-12">
              </div>
              <div class="form-inline col-md-12">
                <div class="col-md-3">
                  <strong><h7>Birthdate: </h7></strong>
                </div>
                <div class="col-md-9">
                  <h7><?=$row['member_BirthDate'] ?></h7>
                </div>
              </div>
              <div class="form-group col-md-12">
              </div>
              <div class="form-inline col-md-12">
                <div class="col-md-3">
                  <strong><h7>Age: </h7></strong>
                </div>
                <div class="col-md-9">
                  <h7><?=$row['member_Age'] ?></h7>
                </div>
              </div>
              <div class="form-group col-md-12">
              </div>
              <div class="form-inline col-md-12">
                <div class="col-md-3">
                  <strong><h7>Address: </h7></strong>
                </div>
                <div class="col-md-9">
                  <h7><?=$row['member_HouseNo'] . " " . $row['member_Street'] . ", " . $row['member_Barangay'] . " " . $row['member_Town'] . ", " . $row['member_Province']  ?></h7>
                </div>
              </div>
              <div class="form-group col-md-12">
              </div>
              <div class="form-inline col-md-12">
                <div class="col-md-3">
                  <strong><h7>Contact#: </h7></strong>
                </div>
                <div class="col-md-9">
                  <h7><?=$row['member_ContactNo'] ?></h7>
                </div>
              </div>
              <div class="form-group col-md-12">
              </div>
              <div class="form-inline col-md-12">
                <div class="col-md-3">
                  <strong><h7>Email Address: </h7></strong>
                </div>
                <div class="col-md-9">
                  <h7><?=$row['member_EmailAddress'] ?></h7>
                </div>
              </div>
              <div class="form-group col-md-12">
              </div>
              <div class="form-inline col-md-12">
                <div class="col-md-3">
                  <strong><h7>Finished Confirmation Class: </h7></strong>
                </div>
                <div class="col-md-9">
                  <h7><?=$row['member_FinishedConfirmationClass'] ?></h7>
                </div>
              </div>
              <div class="form-group col-md-12">
              </div>
              <div class="form-inline col-md-12">
                <div class="col-md-3">
                  <strong><h7>Local Church Name: </h7></strong>
                </div>
                <div class="col-md-9">
                  <h7><?= DisplayChurchLocalName($row['church_ID']);?></h7>
                </div>
              </div>
              <div class="form-group col-md-12">
              </div>
              <div class="form-group col-md-12">
                <hr>
              </div>
              <div class="form-group col-md-3 mx-auto">
                <a href="/viewmembers.php" class="btn Color_Red" name="save"><i class="fas fa-arrow-left"></i> Back</a>
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
