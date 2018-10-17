<?php
include('sql_connection.php');
$response = array(
  'valid' => false,
  'message' => 'Post argument "username" is missing.'
);
$form_Username = $_POST['form_Username'];

$select_sql = "SELECT * FROM `users` WHERE `user_UserName` = '$form_Username';";
$result = mysqli_query($conn , $select_sql);
$numberofUsername = mysqli_num_rows($result);

if( $numberofUsername > 0 ) {
  // User name is registered on another account
  $response = array('valid' => false, 'message' => 'This username is already registered.');
} else {
  // User name is available
  $response = array('valid' => true, 'message' => 'Available');
}
mysqli_close($conn);
echo json_encode($response);
