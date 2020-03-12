<?php
require "init.php";

$user_email = $_POST["user_email"];
$user_password = $_POST["user_password"];

//$user_email = "jamesraj@tvi.com";
//$user_password = "12345";

$sql = "select name from user where email = '$user_email' and password ='$user_password'";

$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result)>0)
{
  $row = mysqli_fetch_assoc($result);
  $name = $row['name'];
  $status ="Welcome";
  echo json_encode(array('response' => $status, 'name'=>$name));

}
else {
  $status = "Incorrect login name or password.";
  echo json_encode(array('response' => $status, 'x'=>$user_email, 'y'=>$user_password));
}


//echo json_encode(array('response' => $status));

mysqli_close($conn);
?>
