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

      <?php include('sql/sql_addmember.php'); ?><!-- SQL -->

      <!--Main Contents STARTS HERE -->
      <form class="form_main border-bottom shadow-sm p-3 bg-white rounded" method="post">
        <div class="form-row col-md-11 mx-auto">
          <div class="form-group col-md-12">
            <br>
          </div>
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
            <input type="text" class="form-control" id="form_FirstName" name="form_FirstName" placeholder="First Name">
          </div>
          <div class="form-group col-md-3">
            <label for="form_MiddleName">Middle Name </label>
            <input type="text" class="form-control" id="form_MiddleName" name="form_MiddleName" placeholder="Middle Name">
          </div>
          <div class="form-group col-md-4">
            <label for="form_LastName">Last Name </label>
            <input type="text" class="form-control" id="form_LastName" name="form_LastName" placeholder="Last Name">
          </div>
          <div class="form-group col-md-1">
            <label for="form_Suffix">Suffix </label>
            <input type="text" class="form-control" id="form_Suffix" name="form_Suffix" placeholder="ex: Jr/Sr">
          </div>
          <div class="form-group col-md-12" style="margin-bottom: 0;">
            <hr>
          </div>

          <div class="form-group col-md-2">
            <label for="form_Gender">Gender</label>
            <select id="form_Gender" name="form_Gender" class="form-control">
              <option value="None">Select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="form_Birthday">Birthday</label>
            <input type="date" class="form-control" id="form_Birthday" name="form_Birthday" placeholder="">
          </div>
          <div class="form-group col-md-1">
            <label for="form_Age">Age</label>
            <input type="number" class="form-control" id="form_Age" name="form_Age" placeholder="0">
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
            <input type="text" class="form-control" id="form_HouseNo" name="form_HouseNo" placeholder="ex: #10">
          </div>
          <div class="form-group col-md-2">
            <label for="form_Street">Street</label>
            <input type="text" class="form-control" id="form_Street" name="form_Street" placeholder="ex: Belmonte Street">
          </div>
          <div class="form-group col-md-3">
            <label for="form_Barangay">Barangay/Poblacion</label>
            <input type="text" class="form-control" id="form_Barangay" name="form_Barangay" placeholder="ex: Zone 1/District 2">
          </div>
          <div class="form-group col-md-3">
            <label for="form_Town">Town/City</label>
            <input type="text" class="form-control" id="form_Town" name="form_Town" placeholder="ex: Urdaneta City">
          </div>
          <div class="form-group col-md-3">
            <label for="form_Province">Province</label>
            <input type="text" class="form-control" id="form_Province" name="form_Province" placeholder="ex: Pangasinan">
          </div>
          <div class="form-group col-md-12" style="margin-bottom: 0;">
            <hr>
          </div>

          <div class="form-group col-md-4">
            <label for="form_ContactNumber">Contact Number </label>
            <input type="text" class="form-control" id="form_ContactNumber" name="form_ContactNumber" placeholder="ex: 9123456789">
          </div>
          <div class="form-group col-md-4">
            <label for="form_EmailAddress">Email Address </label>
            <input type="email" class="form-control" id="form_EmailAddress" name="form_EmailAddress" placeholder="Email Address">
          </div>
          <div class="form-group col-md-4">
            <label for="form_FinishedConfirmationClass">Finished Confirmation Class</label>
            <select id="form_FinishedConfirmationClass" name="form_FinishedConfirmationClass" class="form-control">
              <option value="Yes">Yes</option>
              <option value="No" selected>No</option>
            </select>
          </div>

          <?php include('sql/sql_loadchurches.php'); ?><!--SQL-->
          <div class="form-group col-md-4">
            <label for="form_Church">Chruch</label>
            <select id="form_Church" class="form-control" name="form_Church" <?=$isChurchEmpty ?> >
              <?php
                if (mysqli_num_rows($result) > 0 && $isChurchEmpty == "") {
                    // output data of each row
                    ?>
                    <option selected>Select Church</option>
                    <?php
                    while($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <option value="<?= $row['church_ID']?>"><?= $row['church_LocalName']?></option>
                      <?php
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
            <button type="submit" class="btn Color_Green" name="save"><i class="far fa-save"></i> Save Member</button>
            <button type="reset" class="btn Color_Red" ><i class="fas fa-redo-alt"></i> Reset</button>
          </div>
        </div>
      </form>
      <!--Main Contents ENDS HERE -->
    <?php include('layout/naviagation_mainbarend.php'); ?><!-- Layout End -->

  </body>
</html>
