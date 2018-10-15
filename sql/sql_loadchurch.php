<?php
  function DisplayChurchLocalName($church_ID){
    if ($church_ID == 0) {
      return "All";
    }else {
      include('sql_connection.php');
      $sql2 = "SELECT * FROM `churches` WHERE `church_ID` = $church_ID";
      $result2 = mysqli_query($conn, $sql2);
      if (mysqli_num_rows($result2) > 0) {
        while($row = mysqli_fetch_assoc($result2)) {
          return $row['church_LocalName'];
        }
      }
      mysqli_close($conn);
    }
  }
