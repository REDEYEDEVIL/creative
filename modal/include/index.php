<?php
$msg  = '';
$empty = true;
if (isset($_GET['e'])) {
  $msg = "Your email or password is incorrect";     
}

if (isset($_GET['n'])) {
  $msg = "Enter Your email or password ";
}

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($email)) {
    $empty = false;
  }

  if (empty($password)) {
    $empty = false;
  }
  $password = md5($password);
//this is new
  //write a script to verify user id and pass from data `awt_admin`
  if ($empty) {
    // $query = "";
    // echo $query;
    $result = mysqli_query($sql, "SELECT * FROM `awt_admin` WHERE `email_id` = '$email'  AND `password` = '$password' and `status`!= 1");

    if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_assoc($result);
      $_SESSION['id'] = 1;
      $_SESSION['userid'] = $row['id'];
      $_SESSION['role'] = $row['role']; // added closing single quote
      echo '<script type="text/javascript">window.location.href="dashboard.php";</script>';
    } else {
      echo '<script type="text/javascript">window.location.href="index.php?e=1";</script>';
    }
  } else {
    echo '<script type="text/javascript">window.location.href="index.php?n=1";</script>';
  }
}
