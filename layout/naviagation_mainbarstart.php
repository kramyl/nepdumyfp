<link rel="stylesheet" href="/css/custom/navigation_mainbar.css">
<div class="mainbar">
  <div class="mainbar_nav border-bottom">
    <div class="col-md-12">
      <div class="float-left">
        <?=$page_title?>
      </div>
      <div class="float-right">
        <div class="float-left">
          <a href="viewuser.php?token=<?=$_SESSION['user_Username'] ?>&frmeliforp=ZX0-33FFGX" class="btn btn-sm mainbar_account Color_Green"><h5 class="mainbar_account_text"><i class="fas fa-user"></i> <?=$_SESSION['user_Username'] ?></h5></a>
        </div>
        <div class="float-left">
          <div class="white_space">
          </div>
        </div>
        <div class="float-left">
          <a href="sql/sql_logout.php" class="btn btn-sm mainbar_logout Color_Red"><h5 class="mainbar_logout_text"><i class="fas fa-sign-out-alt"></i> Logout</h5></a>
        </div>
      </div>
    </div>
  </div>
  <div class="main_content">
