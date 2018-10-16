<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>NEPDUMYFP</title>
    <?php include('layout/head.php'); ?>
  </head>
  <body>
    <!-- Page Title -->
    <?php $page_title = '<h4 class="main_title_text"><i class="fas fa-eye"></i> View Users</span></h4>'; ?>

    <!-- Sidebar selected -->
    <?php $page_current = 'users'; ?>

    <?php include('layout/main_layout.php'); ?><!-- Layout Start -->
      <!--Main Contents STARTS HERE -->
      <form class="form_main border-bottom" method="post">

        <?php include('sql/sql_viewusers.php');?><!-- SQL -->

        <div class="form-row col-md-12 mx-auto">
          <div class="form-group col-md-12">
            <br>
          </div>
          <div class="form-group col-md-5">
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
                    <th scope="col">Username</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Local Church</th>
                    <th scope="col">Controls</th>
                  </tr>
                </thead>
                <tbody class="border-bottom">
                  <?php
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $record_Number = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                          $user_Suffix = "";
                          if ($row['user_Suffix'] != "") {
                            $user_Suffix = ", " . $row['user_Suffix'];
                          }
                          $record_Number++;
                          ?>
                          <tr>
                            <td><?=$record_Number ?></td>
                            <td><?=$row['user_UserName'] ?></td>
                            <td><?=$row['user_LastName'] . ", " . $row['user_FirstName'] . " " . $row['user_MiddleName'] . $user_Suffix ?></td>
                            <td><?= DisplayChurchLocalName($row['church_ID']);?></td>
                            <td></td>
                          </tr>
                          <?php
                        }
                    } else {
                        ?>
                        <tr>
                          <td class="table-active" colspan="5"><h5 style="text-align: center;">No data Available</h5></td>
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
