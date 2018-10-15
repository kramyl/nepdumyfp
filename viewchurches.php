<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>NEPDUMYFP</title>
    <?php include('layout/head.php'); ?>
  </head>
  <body>
    <!-- Page Title -->
    <?php $page_title = '<h4 class="main_title_text"><i class="fas fa-eye"></i> View Churches</span></h4>' ?>

    <!-- Sidebar selected -->
    <?php $page_current = 'churches'; ?>

    <?php include('layout/main_layout.php'); ?><!-- Layout Start -->
      <!--Main Contents STARTS HERE -->
      <form class="form_main border-bottom" action="index.html" method="post">
        <div class="form-row col-md-12 mx-auto">
          <div class="form-group col-md-12">
            <br>
          </div>
          <div class="form-group col-md-5">
            <label for="form_Search">Search : </label>
            <div class="btn-group" role="group" aria-label="Basic example">
              <input type="text" class="form-control" name="form_Search" id="form_Search" placeholder="Search...">
              <button type="button" class="btn btn-primary"> <i class="fas fa-search"></i> Search</button>
              <button type="button" class="btn btn-primary">Clear</button>
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
                    <th scope="col">Church Local Name</th>
                    <th scope="col">Full Address</th>
                    <th scope="col">Controls</th>
                  </tr>
                </thead>
                <tbody>
                  <?php include('sql/sql_viewchurches.php');?><!-- SQL -->
                  <?php
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                          ?>
                          <tr>
                            <td>#</td>
                            <td><?=$row['church_LocalName'] ?></td>
                            <td><?=$row['church_Street'] . ", " . $row['church_Barangay'] . " " . $row['church_Town'] . " " .  $row['church_ZipCode']  . ", " . $row['church_Province']  ?></td>
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
