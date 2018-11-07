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
    <?php $page_title = '<h4 class="main_title_text"><i class="fas fa-plus"></i> Add Church</span></h4>'; ?>

    <!-- Sidebar selected -->
    <?php $page_current = 'churches'; ?>

    <?php include('layout/main_layout.php'); ?><!-- Layout Start -->

      <!--Main Contents STARTS HERE -->
      <form class="form_main border-bottom shadow-sm p-3 bg-white rounded" method="post">

        <?php include('sql/sql_updatechurch.php'); ?><!-- SQL -->

        <?php include('sql/sql_viewchurch.php'); ?><!-- SQL -->

        <div class="form-row col-md-12 mx-auto">

          <?php include('layout/response.php');?><!-- layout -->

          <div class="form-group col-md-12">
            <a href="/viewchurches.php" class="btn Color_Red" name="save"><i class="fas fa-arrow-left"></i> Back</a>
            <hr>
          </div>
          <?php
          if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
           ?>
          <div class="form-group col-md-12">
            <h5>Church Information</h5>
            <hr>
          </div>
          <div class="form-group col-md-4">
            <label for="form_ChurchName">Church Local Name</label>
            <input type="text" class="form-control" id="form_ChurchName" name="form_ChurchName" value="<?=$row['church_LocalName'] ?>" placeholder="ex: Urdaneta" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z ]+)$" data-validation-error-msg-custom="This field contains characters and spaces only." readonly>
          </div>
          <div class="form-group col-md-5">
            <label for="form_LocalPastor">Local Pastor</label>
            <input type="text" class="form-control" id="form_LocalPastor" name="form_LocalPastor" value="<?=$row['church_LocalPastor'] ?>" placeholder="ex: Full Name" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z .]+)$" data-validation-error-msg-custom="This field contains characters , dot and spaces only.">
          </div>
          <div class="form-group col-md-3">
            <label for="form_ContactNumber">Contact Number </label>
            <input type="text" class="form-control" id="form_ContactNumber" name="form_ContactNumber" value="<?=$row['church_ContactNumber'] ?>" placeholder="ex: 9123456789" data-validation="number length" data-validation-error-msg-number="This field contains numbers only." data-validation-length="min10" data-validation-error-msg-length="This field contains 10 characters.">
          </div>
          <div class="form-group col-md-12">
            <br>
          </div>
          <div class="form-group col-md-12" style="margin-bottom: 0;">
            <strong><labe>Full Address</label></strong>
            <hr>
          </div>
          <!--<div class="form-group col-md-1">
            <label for="form_HouseNo">House No.</label>
            <input type="text" class="form-control" id="form_HouseNo" name="form_HouseNo" placeholder="ex: #10">
          </div>-->
          <div class="form-group col-md-2">
            <label for="form_Street">Street</label>
            <input type="text" class="form-control" id="form_Street" name="form_Street" value="<?=$row['church_Street'] ?>" placeholder="ex: Belmonte Street" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z .]+)$" data-validation-error-msg-custom="This field contains characters, dot and spaces only.">
          </div>
          <div class="form-group col-md-2">
            <label for="form_Barangay">Barangay/Poblacion</label>
            <input type="text" class="form-control" id="form_Barangay" name="form_Barangay" value="<?=$row['church_Barangay'] ?>" placeholder="ex: Zone 1/District 1" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z0-9 .]+)$" data-validation-error-msg-custom="This field contains alphanumeric, dot and spaces only.">
          </div>
          <div class="form-group col-md-3">
            <label for="form_Town">Town/City</label>
            <input type="text" class="form-control" id="form_Town" name="form_Town" value="<?=$row['church_Town'] ?>" placeholder="ex: Urdaneta City" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z0-9 .]+)$" data-validation-error-msg-custom="This field contains alphanumeric, dot and spaces only.">
          </div>
          <div class="form-group col-md-3">
            <label for="form_Province">Province</label>
            <input type="text" class="form-control" id="form_Province" name="form_Province" value="<?=$row['church_Province'] ?>" placeholder="ex: Pangasinan" data-sanitize="capitalize" data-validation="custom" data-validation-regexp="^([a-zA-Z0-9 .]+){0,}$" data-validation-error-msg-custom="This field contains alphanumeric, dot and spaces only.">
          </div>
          <div class="form-group col-md-2">
            <label for="form_ZipCode">Zip Code</label>
            <input type="text" class="form-control" id="form_ZipCode" name="form_ZipCode" value="<?=$row['church_ZipCode'] ?>" placeholder="ex: 2435" data-validation="number" data-validation-error-msg-number="This field contains numbers only.">
          </div>
          <div class="form-group col-md-12" style="margin-bottom: 0;">
            <hr>
          </div>
          <div class="form-group col-md-12">
            <br>
          </div>
          <div class="form-group col-md-3 mx-auto">
            <button type="submit" class="btn Color_Orange" name="save"><i class="far fa-save"></i> Update Church</button>
            <button type="reset" class="btn Color_Red" ><i class="fas fa-redo-alt"></i> Reset</button>
          </div>
          <div class="form-group col-md-12">
          </div>

        <?php
            }
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
