<?php
include('sql_connection.php');
$response = array(
  'valid' => false,
  'message' => 'Post argument "password" is missing.'
);
$user_Username = $_REQUEST['username'];
$user_Password = $_POST['form_OldPassword'];

$select_sql = "SELECT * FROM `users` WHERE `user_UserName` = '$user_Username' AND `user_Password` = '$user_Password'";
$result = mysqli_query($conn, $select_sql);
$numberofUsername = mysqli_num_rows($result);

if( $numberofUsername > 0 ) {
  // User name is registered on another account
  $response = array('valid' => true, 'message' => 'Correct');
} else {
  // User name is available
  $response = array('valid' => false, 'message' => 'Password is incorrect.');
}
mysqli_close($conn);
echo json_encode($response);
