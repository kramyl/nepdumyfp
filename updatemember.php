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
    <?php $page_title = '<h4 class="main_title_text"><i class="fas fa-plus"></i> Add Member</span></h4>'; ?>

    <!-- Sidebar selected -->
    <?php $page_current = 'members'; ?>

    <?php include('layout/main_layout.php'); ?><!-- Layout Start -->

      <!--Main Contents STARTS HERE -->
      <form class="form_main border-bottom shadow-sm p-3 bg-white rounded" method="post">

        <?php include('sql/sql_updatemember.php');?><!-- SQL -->

        <?php include('sql/sql_viewmember.php');?><!-- SQL -->

        <div class="form-row col-md-12 mx-auto">

          <?php include('layout/response.php');?><!-- layout -->

          <div class="form-group col-md-12">
            <a href="/viewmembers.php" class="btn Color_Red" name="save"><i class="fas fa-arrow-left"></i> Back</a>
            <hr>
          </div>
          <?php if (mysqli_num_rows($result_viewmember) > 0) {

              while($row = mysqli_fetch_assoc($result_viewmember)) {

            ?>
          <div class="form-group col-md-12">
            <h5>Member Information</h5>
            <hr>
          </div>
          <div class="form-group col-md-12" style="margin-bottom: 0;">
            <strong><labe>Full Name</label></strong>
            <hr>
          </div>
          <div class="form-group col-md-4">
            <label for="form_FirstName">First Name </label>
            <input type="text" class="form-control" id="form_FirstName" name="form_FirstName" value="<?=$row['member_FirstName'] ?>" placeholder="First Name" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z ]+)$" data-validation-error-msg-custom="This field contains characters and spaces only.">
          </div>
          <div class="form-group col-md-3">
            <label for="form_MiddleName">Middle Name </label>
            <input type="text" class="form-control" id="form_MiddleName" name="form_MiddleName" value="<?=$row['member_MiddleName'] ?>" placeholder="Middle Name" data-sanitize="capitalize" data-validation="custom" data-validation-regexp="^([a-zA-Z. ]+){0,}$" data-validation-error-msg-custom="This field contains characters, dot and spaces only.">
          </div>
          <div class="form-group col-md-3">
            <label for="form_LastName">Last Name </label>
            <input type="text" class="form-control" id="form_LastName" name="form_LastName" value="<?=$row['member_LastName'] ?>" placeholder="Last Name" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z ]+)$" data-validation-error-msg-custom="This field contains characters and spaces only.">
          </div>
          <div class="form-group col-md-2">
            <label for="form_Suffix">Suffix </label>
            <input type="text" class="form-control" id="form_Suffix" name="form_Suffix" value="<?=$row['member_Suffix'] ?>" placeholder="ex: Jr/Sr" data-sanitize="capitalize" data-validation="custom" data-validation-regexp="^([a-zA-Z0-9. ]+){0,}$" data-validation-error-msg-custom="This field contains alphanumeric, dot and spaces only.">
          </div>
          <div class="form-group col-md-12" style="margin-bottom: 0;">
            <hr>
          </div>

          <div class="form-group col-md-2">
            <label for="form_Gender">Gender</label>
            <select id="form_Gender" name="form_Gender" class="form-control" data-validation="required">
              <option value="">Select Gender</option>
              <option value="Male" <?php if ($row['member_Gender'] == "Male") { echo "selected"; } ?>>Male</option>
              <option value="Female" <?php if ($row['member_Gender'] == "Female") { echo "selected"; } ?>>Female</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="form_Birthday">Birthday</label>
            <input type="date" class="form-control" id="form_Birthday" name="form_Birthday" value="<?=$row['member_BirthDate'] ?>" placeholder="" data-validation="required">
          </div>
          <div class="form-group col-md-1">
            <label for="form_Age">Age</label>
            <input type="text" class="form-control" id="form_Age" name="form_Age" value="<?=$row['member_Age'] ?>" placeholder="0" data-validation="required number"  data-validation-error-msg-number="This field contains numbers only.">
            <!--
            <select id="form_Age" name="form_Age" class="form-control">
              <?php
                for ($i=0; $i <=100 ; $i++) {
                  ?>
                  <option value="<?=$i ?>"><?=$i ?></option>
                  <?php
                }
               ?>
            </select>
          -->
          </div>

          <div class="form-group col-md-12" style="margin-bottom: 0;">
            <strong><labe>Full Address</label></strong>
            <hr>
          </div>
          <div class="form-group col-md-1">
            <label for="form_HouseNo">House No.</label>
            <input type="text" class="form-control" id="form_HouseNo" name="form_HouseNo" value="<?=$row['member_HouseNo'] ?>" placeholder="ex: #10" data-validation="required custom" data-validation-regexp="^([0-9#]+)$" data-validation-error-msg-custom="This field contains numbers and # only.">
          </div>
          <div class="form-group col-md-2">
            <label for="form_Street">Street</label>
            <input type="text" class="form-control" id="form_Street" name="form_Street" value="<?=$row['member_Street'] ?>" placeholder="ex: Belmonte Street" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z .]+)$" data-validation-error-msg-custom="This field contains characters, dot and spaces only.">
          </div>
          <div class="form-group col-md-3">
            <label for="form_Barangay">Barangay/Poblacion</label>
            <input type="text" class="form-control" id="form_Barangay" name="form_Barangay" value="<?=$row['member_Barangay'] ?>" placeholder="ex: Zone 1/District 1" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z0-9 .]+)$" data-validation-error-msg-custom="This field contains alphanumeric, dot and spaces only.">
          </div>
          <div class="form-group col-md-3">
            <label for="form_Town">Town/City</label>
            <input type="text" class="form-control" id="form_Town" name="form_Town" value="<?=$row['member_Town'] ?>" placeholder="ex: Urdaneta City" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z0-9 .]+)$" data-validation-error-msg-custom="This field contains alphanumeric, dot and spaces only.">
          </div>
          <div class="form-group col-md-3">
            <label for="form_Province">Province</label>
            <input type="text" class="form-control" id="form_Province" name="form_Province" value="<?=$row['member_Province'] ?>" placeholder="ex: Pangasinan" data-sanitize="capitalize" data-validation="custom" data-validation-regexp="^([a-zA-Z0-9 .]+){0,}$" data-validation-error-msg-custom="This field contains alphanumeric, dot and spaces only.">
          </div>
          <div class="form-group col-md-12" style="margin-bottom: 0;">
            <hr>
          </div>

          <div class="form-group col-md-4">
            <label for="form_ContactNumber">Contact Number </label>
            <input type="text" class="form-control" id="form_ContactNumber" name="form_ContactNumber" value="<?=$row['member_ContactNo'] ?>" placeholder="ex: 9123456789" data-validation="number length" data-validation-error-msg-number="This field contains numbers only." data-validation-length="min10" data-validation-error-msg-length="This field contains 10 characters.">
          </div>
          <div class="form-group col-md-4">
            <label for="form_EmailAddress">Email Address </label>
            <input type="email" class="form-control" id="form_EmailAddress" name="form_EmailAddress" value="<?=$row['member_EmailAddress'] ?>" placeholder="Email Address" data-validation="email">
          </div>
          <div class="form-group col-md-4">
            <label for="form_FinishedConfirmationClass">Finished Confirmation Class</label>
            <select id="form_FinishedConfirmationClass" name="form_FinishedConfirmationClass" class="form-control">
              <option value="Yes" <?php if ($row['member_FinishedConfirmationClass'] == "Yes") { echo "selected"; } ?>>Yes</option>
              <option value="No" <?php if ($row['member_FinishedConfirmationClass'] == "No") { echo "selected"; } ?>>No</option>
            </select>
          </div>

          <?php include('sql/sql_loadchurches.php'); ?><!--SQL-->
          <div class="form-group col-md-4">
            <label for="form_Church">Local Church</label>
            <select id="form_Church" class="form-control" name="form_Church" <?php if ($_SESSION['church_ID'] != "0") { echo "disabled"; } else{echo $isChurchEmpty;} ?> data-validation="required">
              <?php
                if (mysqli_num_rows($result) > 0 && $isChurchEmpty == "") {
                    // output data of each row
                    ?>
                    <?php
                    while($row_church = mysqli_fetch_assoc($result)) {
                      if ($_SESSION['church_ID'] == "0") {
                        // if the current log acccount is super admin display all
                        ?>
                        <option value="<?= $row_church['church_ID']?>" <?php if ($row_church['church_ID'] == $row['church_ID']) { echo "selected"; } ?>><?= $row_church['church_LocalName']?></option>
                        <?php
                      }else {
                        if ($_SESSION['church_ID'] == $row['church_ID']) {
                          // if the current log acccount is admin display his local church
                          ?>
                          <option value="<?= $row_church['church_ID']?>"selected><?= $row_church['church_LocalName']?></option>
                          <?php
                        }

                      }

                    }
                } else {
                    ?>
                    <option selected>No Church Available</option>
                    <?php
                }
              ?>
            </select>
          </div>

          <div class="form-group col-md-12">
            <br>
          </div>
          <div class="form-group col-md-3 mx-auto">
            <button type="submit" class="btn Color_Orange" name="save"><i class="far fa-save"></i> Update Member</button>
            <button type="reset" class="btn Color_Red" ><i class="fas fa-redo-alt"></i> Reset</button>
          </div>
          <?php
              }
            }
            mysqli_close($conn);
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
