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
    <?php $page_title = '<h4 class="main_title_text"><i class="fas fa-eye"></i> View Users</span></h4>'; ?>

    <!-- Sidebar selected -->
    <?php $page_current = 'users'; ?>

    <?php include('layout/main_layout.php'); ?><!-- Layout Start -->
      <!--Main Contents STARTS HERE -->
      <form class="form_main border-bottom" method="post">

        <?php include('sql/sql_viewusers.php');?><!-- SQL -->
        <div class="form-row col-md-12 mx-auto">
          <?php include('layout/response.php');?><!-- layout -->

          <div class="form-group col-md-5">
            <label for="form_Search">Search : </label>
            <br>
            <div class="btn-group" role="group" aria-label="Basic example">
              <input type="text" class="form-control" name="form_Search" value="<?php if (isset($form_search)) { echo $form_search;} ?>" id="form_Search" placeholder="Search by Username/Name...">
              <button type="submit" class="btn btn-light border" name="button_Search"> <i class="fas fa-search"></i> Search</button>
              <button type="submit" class="btn Color_Red border" name="button_Clear">Clear Searched</button>
            </div>
          </div>
          <div class="form-group col-md-12">
            <div class="table-responsive">
              <table class="table table-hover border-bottom" id="table">
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
                            <td>
                              <a href="viewuser.php?token=<?=$row['user_UserName'] ?>" class="btn btn-sm Color_Green"><i class="fas fa-eye" style="font-size: 20px; padding-top: 3px;"></i></a>
                              <button type="button" class="btn btn-sm Color_Orange" onclick="ModalReParent(edit<?=$row['user_ID']?>)" data-toggle="modal" data-target="#edit<?=$row['user_ID'] ?>"><i class="fas fa-edit" style="font-size: 20px; padding-top: 3px;"></i></button>
                              <?php
                                if ($row['user_AccountType'] != "SuperAdmin" && $_SESSION['user_Username']  != $row['user_UserName'] ) {
                                  ?>
                                    <button type="button" class="btn btn-sm Color_Red" onclick="ModalReParent(delete<?=$row['user_ID']?>)" data-toggle="modal" data-target="#delete<?=$row['user_ID'] ?>"><i class="far fa-trash-alt" style="font-size: 20px; padding-top: 3px;"></i></button>
                                  <?php
                                }
                               ?>
                            </td>
                          </tr>
                          <!-- Start Edit Modal -->
                          <div class="modal fade" id="edit<?=$row['user_ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content ">
                                <div class="modal-header Color_Orangex">
                                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Edit</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="far fa-times-circle Color_Orangex"></i></span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <h6><strong><?=$row['user_UserName'] ?></strong></h6>
                                  Do you want to edit this User?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-light border" data-dismiss="modal">Close</button>
                                  <a class="btn Color_Orange" href="updateuser.php?token=<?=$row['user_UserName'] ?>">Confirm</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- End Edit Modal -->
                          <!-- Start Delete Modal -->
                          <div class="modal fade" id="delete<?=$row['user_ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content ">
                                <div class="modal-header Color_Redx">
                                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash-alt"></i> Delete</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="far fa-times-circle Color_Redx"></i></span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <h6><strong><?=$row['user_UserName'] ?></strong></h6>
                                  Do you want to delete this User?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-light border" data-dismiss="modal">Close</button>
                                  <a class="btn Color_Red" href="sql/sql_deleteuser.php?token=<?=$row['user_UserName'] ?>">Confirm</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- End Delete Modal -->
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
  <footer>
    <?php include('layout/foot.php'); ?>
  </footer>
</html>
