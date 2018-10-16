<?php
  if ($pageType == "adduser") {
    include('sql_connection.php');
    $sql = "SELECT * FROM `churches`";
    $result = mysqli_query($conn, $sql);
    $countAvailableChurch = 0;
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          if (CheckIfAccountExistAtChurch($row['church_ID']) == 0) {
            $countAvailableChurch++;
          }
        }
    }
    $isChurchEmpty = "";
    if ($countAvailableChurch == 0) {
      $isChurchEmpty = "disabled";
    }
    mysqli_close($conn);
  }else {
    include('sql_connection.php');
    $sql = "SELECT * FROM `churches`";
    $result = mysqli_query($conn, $sql);
  }

  function CheckIfAccountExistAtChurch($church_ID){
    include('sql_connection.php');
    $sql2 = "SELECT * FROM `users` WHERE `church_ID` = $church_ID";
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) > 0) {
      return 1;
    }else {
      return 0;
    }
    mysqli_close($conn);
  }
