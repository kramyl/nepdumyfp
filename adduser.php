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
    <?php $page_title = '<h4 class="main_title_text"><i class="fas fa-plus"></i> Add Users</span></h4>'; ?>

    <!-- Sidebar selected -->
    <?php $page_current = 'users'; ?>

    <?php include('layout/main_layout.php'); ?><!-- Layout Start -->

      <?php include('sql/sql_adduser.php'); ?><!-- SQL -->

      <!--Main Contents STARTS HERE -->
      <form class="form_main border-bottom shadow-sm p-3 bg-white rounded" method="post">
        <div class="form-row col-md-11 mx-auto">
          <div class="form-group col-md-12">
            <br>
          </div>
          <div class="form-group col-md-12">
            <h5>Account Information</h5>
            <hr>
          </div>
          <div class="form-group col-md-4">
            <label for="form_Username">Username </label>
            <input type="text" class="form-control" id="form_Username" name="form_Username" placeholder="Username" data-validation="required length server" data-validation-url="sql/sql_searchusername.php" data-validation-length="5-26"  data-validation-error-msg-length="The username value must between 5-26 characters.">
          </div>
          <div class="form-group col-md-8">
          </div>
          <div class="form-group col-md-4">
            <label for="form_Password">Password </label>
            <input type="password" class="form-control" id="form_Password" name="form_Password" placeholder="Password" data-validation="required length" data-validation-length="min6"  data-validation-error-msg-length="The password must contain atleast 6 characters.">
          </div>
          <div class="form-group col-sm-4">
            <label for="form_Retype_Password">Re-Type Password </label>
            <input type="password" class="form-control" id="form_Retype_Password" name="form_Retype_Password" placeholder="Re-Type Password" data-validation="confirmation" data-validation-confirm="form_Password" data-validation-error-msg="The password does not match.">
          </div>
          <div class="form-group col-md-12">
            <br>
          </div>
          <div class="form-group col-md-12">
            <h5>User Information</h5>
            <hr>
          </div>
          <div class="form-group col-md-12" style="margin-bottom: 0;">
            <strong><labe>Full Name</label></strong>
            <hr>
          </div>
          <div class="form-group col-md-4">
            <label for="form_FirstName">First Name </label>
            <input type="text" class="form-control" id="form_FirstName" name="form_FirstName" placeholder="First Name" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z ]+)$" data-validation-error-msg-custom="This field contains characters and spaces only.">
          </div>
          <div class="form-group col-md-3">
            <label for="form_MiddleName">Middle Name </label>
            <input type="text" class="form-control" id="form_MiddleName" name="form_MiddleName" placeholder="Middle Name" data-sanitize="capitalize" data-validation="custom" data-validation-regexp="^([a-zA-Z. ]+){0,}$" data-validation-error-msg-custom="This field contains characters, dot and spaces only.">
          </div>
          <div class="form-group col-md-3">
            <label for="form_LastName">Last Name </label>
            <input type="text" class="form-control" id="form_LastName" name="form_LastName" placeholder="Last Name" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z ]+)$" data-validation-error-msg-custom="This field contains characters and spaces only.">
          </div>
          <div class="form-group col-md-2">
            <label for="form_Suffix">Suffix </label>
            <input type="text" class="form-control" id="form_Suffix" name="form_Suffix" placeholder="ex: Jr/Sr" data-sanitize="capitalize" data-validation="custom" data-validation-regexp="^([a-zA-Z0-9. ]+){0,}$" data-validation-error-msg-custom="This field contains alphanumeric, dot and spaces only.">
          </div>
          <div class="form-group col-md-12" style="margin-bottom: 0;">
            <hr>
          </div>
          <div class="form-group col-md-4">
            <label for="form_Church">Chruch</label>

            <?php $pageType="adduser"; include('sql/sql_loadchurches.php'); ?>

            <select id="form_Church" class="form-control" name="form_Church" <?=CheckIfLocalChurchAvailable(); ?> >
              <?php
                if (mysqli_num_rows($result) > 0  && CheckIfLocalChurchAvailable() == "") {
                    // output data of each row
                    ?>
                    <option selected>Select Church</option>
                    <?php
                    while($row = mysqli_fetch_assoc($result)) {

                      if (CheckIfAccountExistAtChurch($row['church_ID']) == 0) {
                        ?>
                        <option value="<?= $row['church_ID']?>"><?= $row['church_LocalName']?></option>
                        <?php
                      }
                    }

                } else {
                    ?>
                    <option selected>No Church Available</option>
                    <?php
                }
                mysqli_close($conn);
              ?>
            </select>
          </div>
          <div class="form-group col-md-12">
            <br>
          </div>
          <div class="form-group col-md-3 mx-auto">
            <button type="submit" class="btn Color_Green" name="save" <?=CheckIfLocalChurchAvailable(); ?>><i class="far fa-save"></i> Save User</button>
            <button type="reset" class="btn Color_Red" ><i class="fas fa-redo-alt"></i> Reset</button>
          </div>
          <div class="form-group col-md-12">
          </div>
        </div>
      </form>
      <!--Main Contents ENDS HERE -->
    <?php include('layout/naviagation_mainbarend.php'); ?><!-- Layout End -->

  </body>
  <footer>
    <?php include('layout/foot.php'); ?>
  </footer>
</html>
