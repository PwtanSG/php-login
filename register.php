<?php
require "init.php";
$name = "name";
$user_email = "user@email";
$user_password = "userpassword";
$name = $_POST["name"];
$user_email = $_POST["user_email"];
$user_password = $_POST["user_password"];

$sql = "select * from user where email = '$user_email'";

$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result)>0)
{
  $status = "exist";
}
else {
  $sql = "insert into user(name,email,password) values ('$name','$user_email','$user_password')";
  if (mysqli_query($conn,$sql)){
    $status = "ok";
  }else{
    $status = "error";
  }
}

echo json_encode(array('response' => $status));

mysqli_close($conn);
?>


