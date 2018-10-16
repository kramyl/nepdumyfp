<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>NEPDUMYFP</title>
    <?php include('layout/head.php'); ?>
  </head>
  <body>
    <!-- Page Title -->
    <?php $page_title = '<h4 class="main_title_text"><i class="fas fa-eye"></i> View Members</span></h4>' ?>

    <!-- Sidebar selected -->
    <?php $page_current = 'members'; ?>

    <?php include('layout/main_layout.php'); ?><!-- Layout Start -->
      <!--Main Contents STARTS HERE -->
      <form class="form_main border-bottom" method="post">

        <?php include('sql/sql_viewmembers.php');?><!-- SQL -->

        <div class="form-row col-md-12 mx-auto">
          <div class="form-group col-md-12">
            <br>
          </div>
          <?php include('sql/sql_loadchurches.php'); ?><!--SQL-->
          <div class="form-group col-md-2">
            <label for="form_Church">Local Church :</label>
            <br>
            <select id="form_Church" class="form-control" name="form_Church" <?=$isChurchEmpty ?>>
              <?php
                if (mysqli_num_rows($result) > 0 && $isChurchEmpty == "") {
                    // output data of each row
                    ?>
                    <option <?php if (isset($form_Church)) {if ($form_Church == "ALL") {echo "selected";}} ?> value="ALL">All</option>
                    <?php
                    while($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <option <?php if (isset($form_Church)) {if ($form_Church == $row['church_ID']) { echo "selected"; }} ?> value="<?= $row['church_ID']?>"><?= $row['church_LocalName']?></option>
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
          <div class="form-group col-md-6">
            <label for="form_Search">Search : </label>
            <br>
            <div class="btn-group" role="group" aria-label="Basic example">
              <input type="text" class="form-control" name="form_Search" value="<?php if (isset($form_search)) { echo $form_search;} ?>" id="form_Search" placeholder="Search...">
              <button type="submit" class="btn btn-light border" name="button_Search"> <i class="fas fa-search"></i> Search</button>
              <button type="submit" class="btn Color_Red border" name="button_Clear">Clear</button>
            </div>
          </div>
          <div class="form-group col-md-12">
            <br>
          </div>
          <div class="form-group col-md-12">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Contact No.</th>
                    <th scope="col">Church</th>
                    <th scope="col">Controls</th>
                  </tr>
                </thead>
                <tbody class="border-bottom">
                  <?php
                    if (mysqli_num_rows($result_viewmember) > 0) {
                        // output data of each row
                        $record_Number = 0;
                        while($row = mysqli_fetch_assoc($result_viewmember)) {
                          $record_Number++;
                          $member_Suffix = "";
                          if ($row['member_Suffix'] != "") {
                            $member_Suffix = ", " . $row['member_Suffix'];
                          }
                          ?>
                          <tr>
                            <td><?=$record_Number ?></td>
                            <td><?=$row['member_LastName'] . ", " . $row['member_FirstName'] . " " . $row['member_MiddleName'] . $member_Suffix ?></td>
                            <td><?=$row['member_HouseNo'] . " " . $row['member_Street'] . ", " . $row['member_Barangay'] . " " . $row['member_Town'] . ", " . $row['member_Province']  ?></td>
                            <td><?=$row['member_EmailAddress'] ?></td>
                            <td><?=$row['member_ContactNo'] ?></td>
                            <td><?= DisplayChurchLocalName($row['church_ID']);?></td>
                            <td></td>
                          </tr>
                          <?php
                        }
                    } else {
                        ?>
                        <tr>
                          <td class="table-active" colspan="7"><h5 style="text-align: center;">No data Available</h5></td>
                        </tr>
                        <?php
                    }
                    mysqli_close($conn);
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </form>
      <!--Main Contents ENDS HERE -->
    <?php include('layout/naviagation_mainbarend.php'); ?><!-- Layout End -->

  </body>
</html>
