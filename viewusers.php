<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Users</title>
    <?php include('layout/head.php'); ?>
  </head>
  <body>
    <!-- Page Title -->
    <?php $page_title = '<h4 class="main_title_text"><i class="fas fa-eye"></i> View Users</span></h4>'; ?>

    <!-- Sidebar selected -->
    <?php $page_current = 'users'; ?>

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
              <button type="button" class="btn btn-light border"> <i class="fas fa-search"></i> Search</button>
              <button type="button" class="btn btn-light border">Clear</button>
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
                    <th scope="col">Church</th>
                    <th scope="col">Controls</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>kramyl</td>
                    <td>Raymark Chan Bornales</td>
                    <td>None</td>
                    <td></td>
                  </tr>
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
