<div class="form-group col-md-12 mx-auto">
  <?php if ($_SESSION['successMessage'] != "") {
    ?>
    <div class="form-group col-md-5" style="position: absolute; top: 10px; right: 0;">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?=$_SESSION['successMessage'] ?>
        <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>-->
      </div>
    </div>
    <?php
     $_SESSION['successMessage'] = "";
  } ?>
</div>
