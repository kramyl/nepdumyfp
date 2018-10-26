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
        $page_title = '<h4 class="main_title_text"><i class="fas fa-eye"></i> Update My Account</span></h4>';
        //Sidebar selected
        if ($_SESSION['user_AccountType'] == "SuperAdmin") {
          // code...
          $page_current = 'users';
        }else {
          $page_current = 'members';
        }
      }else {
        //Page Title
        $page_title = '<h4 class="main_title_text"><i class="fas fa-eye"></i> Update User</span></h4>';
        //Sidebar selected
        $page_current = 'users';
      }
     ?>

    <?php include('layout/main_layout.php'); ?><!-- Layout Start -->

      <!--Main Contents STARTS HERE -->
      <form id="form" class="form_main border-bottom shadow-sm p-3 bg-white rounded" method="post">

        <?php include('sql/sql_updateuser.php'); ?><!-- SQL -->

        <?php include('sql/sql_viewuser.php'); ?><!-- SQL -->

        <div class="form-row col-md-12 mx-auto">

          <?php include('layout/response.php');?><!-- layout -->

          <div class="form-group col-md-12">
            <a href="/viewusers.php" class="btn Color_Red" name="save"><i class="fas fa-arrow-left"></i> Back</a>
            <hr>
          </div>
          <?php
          if (mysqli_num_rows($result_viewuser) > 0) {

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
            <div class="form-group col-md-4">
              <label for="form_Username">Username </label>
              <input type="text" class="form-control" id="form_Username" name="form_Username" value="<?=$row['user_UserName'] ?>" placeholder="Username" readonly>
            </div>
            <div class="form-group col-md-8">
            </div>
            <div class="form-group col-md-4">
              <label for="form_OldPassword">Old Password </label>
              <input type="password" class="form-control" id="form_OldPassword" name="form_OldPassword" placeholder="Password" data-validation="required server" data-validation-url="sql/sql_searchpassword.php?username=<?=$row['user_UserName'] ?>">
            </div>
            <div class="form-group col-md-12">
              <hr>
              <button class="btn Color_Orange" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                 New Password
               </button>
            </div>
            <div class="form-group col-md-12 collapse" id="collapseExample">
               <hr>
              <div class="form-group col-md-4">
                <label for="form_Password">New Password </label>
                <input type="password" class="form-control" id="form_Password" name="form_Password" placeholder="Password" data-validation="" data-validation-length="min6"  data-validation-error-msg-length="The password must contain atleast 6 characters.">
              </div>
              <div class="form-group col-sm-4">
                <label for="form_Retype_Password">Re-Type New Password </label>
                <input type="password" class="form-control" id="form_Retype_Password" name="form_Retype_Password" placeholder="Re-Type Password" data-validation="confirmation" data-validation-confirm="form_Password" data-validation-error-msg="The password does not match.">
              </div>
              <hr>
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
              <input type="text" class="form-control" id="form_FirstName" name="form_FirstName" value="<?=$row['user_FirstName'] ?>" placeholder="First Name" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z ]+)$" data-validation-error-msg-custom="This field contains characters and spaces only.">
            </div>
            <div class="form-group col-md-3">
              <label for="form_MiddleName">Middle Name </label>
              <input type="text" class="form-control" id="form_MiddleName" name="form_MiddleName" value="<?=$row['user_MiddleName'] ?>" placeholder="Middle Name" data-sanitize="capitalize" data-validation="custom" data-validation-regexp="^([a-zA-Z. ]+){0,}$" data-validation-error-msg-custom="This field contains characters, dot and spaces only.">
            </div>
            <div class="form-group col-md-3">
              <label for="form_LastName">Last Name </label>
              <input type="text" class="form-control" id="form_LastName" name="form_LastName" value="<?=$row['user_LastName'] ?>" placeholder="Last Name" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z ]+)$" data-validation-error-msg-custom="This field contains characters and spaces only.">
            </div>
            <div class="form-group col-md-2">
              <label for="form_Suffix">Suffix </label>
              <input type="text" class="form-control" id="form_Suffix" name="form_Suffix" value="<?=$row['user_Suffix'] ?>" placeholder="ex: Jr/Sr" data-sanitize="capitalize" data-validation="custom" data-validation-regexp="^([a-zA-Z0-9. ]+){0,}$" data-validation-error-msg-custom="This field contains alphanumeric, dot and spaces only.">
            </div>
            <div class="form-group col-md-12" style="margin-bottom: 0;">
              <hr>
            </div>
            <div class="form-group col-md-4">
              <label for="form_Church">Local Church</label>

              <?php $pageType="adduser"; include('sql/sql_loadchurches.php'); ?>

              <select id="form_Church" class="form-control" name="form_Church" disabled>
                <?php
                  if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row_church = mysqli_fetch_assoc($result)) {

                        if ($row_church['church_ID'] == $row['church_ID']) {
                          ?>
                          <option value="<?= $row_church['church_ID']?>" selected><?= $row_church['church_LocalName']?></option>
                          <?php
                        }else if($row['church_ID'] == "0") {
                          ?>
                          <option value="0" selected>ALL</option>
                          <?php
                        }
                      }

                  }
                ?>
              </select>
            </div>
            <div class="form-group col-md-12">
              <br>
              <hr>
            </div>
            <div class="form-group col-md-3 mx-auto">
              <button type="submit" class="btn Color_Orange" name="update"><i class="far fa-save"></i> Update User</button>
              <button type="reset" class="btn Color_Red" ><i class="fas fa-redo-alt"></i> Reset</button>
            </div>
            <?php
            }
          }
          mysqli_close($conn);
          ?>
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
