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

      <?php include('sql/sql_addchurch.php'); ?><!-- SQL -->

      <!--Main Contents STARTS HERE -->
      <form class="form_main border-bottom shadow-sm p-3 bg-white rounded" method="post">
        <div class="form-row col-md-12 mx-auto">

          <?php include('layout/response.php');?><!-- layout -->

          <div class="form-group col-md-12">
            <a href="/viewchurches.php" class="btn Color_Red" name="save"><i class="fas fa-arrow-left"></i> Back</a>
            <hr>
          </div>
          <div class="form-group col-md-12">
            <h5>Church Information</h5>
            <hr>
          </div>
          <div class="form-group col-md-4">
            <label for="form_ChurchName">Church Local Name</label>
            <input type="text" class="form-control" id="form_ChurchName" name="form_ChurchName" placeholder="ex: Urdaneta" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z ]+)$" data-validation-error-msg-custom="This field contains characters and spaces only.">
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
            <input type="text" class="form-control" id="form_Street" name="form_Street" placeholder="ex: Belmonte Street" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z .]+)$" data-validation-error-msg-custom="This field contains characters, dot and spaces only.">
          </div>
          <div class="form-group col-md-2">
            <label for="form_Barangay">Barangay/Poblacion</label>
            <input type="text" class="form-control" id="form_Barangay" name="form_Barangay" placeholder="ex: Zone 1/District 1" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z0-9 .]+)$" data-validation-error-msg-custom="This field contains alphanumeric, dot and spaces only.">
          </div>
          <div class="form-group col-md-3">
            <label for="form_Town">Town/City</label>
            <input type="text" class="form-control" id="form_Town" name="form_Town" placeholder="ex: Urdaneta City" data-sanitize="capitalize" data-validation="required custom" data-validation-regexp="^([a-zA-Z0-9 .]+)$" data-validation-error-msg-custom="This field contains alphanumeric, dot and spaces only.">
          </div>
          <div class="form-group col-md-3">
            <label for="form_Province">Province</label>
            <input type="text" class="form-control" id="form_Province" name="form_Province" placeholder="ex: Pangasinan" data-sanitize="capitalize" data-validation="custom" data-validation-regexp="^([a-zA-Z0-9 .]+){0,}$" data-validation-error-msg-custom="This field contains alphanumeric, dot and spaces only.">
          </div>
          <div class="form-group col-md-2">
            <label for="form_ZipCode">Zip Code</label>
            <input type="text" class="form-control" id="form_ZipCode" name="form_ZipCode" placeholder="ex: 2435" data-validation="number" data-validation-error-msg-number="This field contains numbers only.">
          </div>
          <div class="form-group col-md-12" style="margin-bottom: 0;">
            <hr>
          </div>
          <div class="form-group col-md-12">
            <br>
          </div>
          <div class="form-group col-md-3 mx-auto">
            <button type="submit" class="btn Color_Green" name="save"><i class="far fa-save"></i> Save Church</button>
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
