<link rel="stylesheet" href="/css/custom/navigation_side.css">
<div class="sidebar">
  <ul class="list-group border-bottom">
    <?php $activestate_members = ""; if ($page_current == "members") { $activestate_members = "activestate"; } ?>
    <li class="list-group-item sidebar_list <?=$activestate_members ?>">
      <div aria-expanded="false" class="sidebar_button <?=$activestate_members ?>"><h4 class="sidebar_button_text "><i class="fas fa-users"></i> Members <i class="fas fa-angle-right float-right"></i></span></h4></div>
    </li>
    <li class="list-group-item sidebar_sublist">
      <a href="addmember.php" class="btn sidebar_subbutton"><h6 class="sidebar_subbutton_text"><i class="fas fa-plus"></i> Add Member</h6></a>
    </li>
    <li class="list-group-item sidebar_sublist">
      <a href="viewmembers.php" class="btn sidebar_subbutton"><h6 class="sidebar_subbutton_text"><i class="fas fa-eye"></i> View Members</h6></a>
    </li>
    <li class="sidebar_list_footer <?=$activestate_members ?>">
    </li>
    
    <?php if ($_SESSION['user_AccountType'] == "SuperAdmin") {
      ?>
      <?php $activestate_churches = ""; if ($page_current == "churches") { $activestate_churches = "activestate"; } ?>
      <li class="list-group-item sidebar_list <?=$activestate_churches ?>">
        <div aria-expanded="false" class="sidebar_button <?=$activestate_churches ?>"><h4 class="sidebar_button_text "><i class="fas fa-church"></i> Churches <i class="fas fa-angle-right float-right"></i></span></h4></div>
      </li>
      <li class="list-group-item sidebar_sublist">
        <a href="addchurch.php" class="btn sidebar_subbutton"><h6 class="sidebar_subbutton_text"><i class="fas fa-plus"></i> Add Church</h6></a>
      </li>
      <li class="list-group-item sidebar_sublist">
        <a href="viewchurches.php" class="btn sidebar_subbutton"><h6 class="sidebar_subbutton_text"><i class="fas fa-eye"></i> View Churches</h6></a>
      </li>
      <li class="sidebar_list_footer <?=$activestate_churches ?>">
      </li>

      <?php $activestate_user = ""; if ($page_current == "users") { $activestate_user = "activestate"; } ?>
      <li class="list-group-item sidebar_list <?=$activestate_user ?>">
        <div aria-expanded="false" class="sidebar_button <?=$activestate_user ?>"><h4 class="sidebar_button_text "><i class="fas fa-users"></i> Users <i class="fas fa-angle-right float-right"></i></span></h4></div>
      </li>
      <li class="list-group-item sidebar_sublist">
        <a href="adduser.php" class="btn sidebar_subbutton"><h6 class="sidebar_subbutton_text"><i class="fas fa-plus"></i> Add User</h6></a>
      </li>
      <li class="list-group-item sidebar_sublist">
        <a href="viewusers.php" class="btn sidebar_subbutton"><h6 class="sidebar_subbutton_text"><i class="fas fa-eye"></i> View Users</h6></a>
      </li>
      <li class="sidebar_list_footer <?=$activestate_user ?>">
      </li>
      <?php
    } ?>
  </ul>
</div>
