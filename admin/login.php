<!-- <link rel="stylesheet" href="../public/css/login.css">
<link rel="stylesheet" href="../public/css/bootstrap.min.css"> -->


<?php
require_once('../vendor/autoload.php');
require_once('../config/database.php');
session_start();
$_SESSION['useradmin'] = 'admin';
if(!isset($_SESSION['useradmin']))
{
  header('location:index.php');
}
use App\Models\User;
if(isset($_POST['dangnhap']))
{
  $username = $_POST['username'];
  $password =sha1($_POST['password']);
  if(filter_var($username,FILTER_VALIDATE_EMAIL))
  {
    $args = [
      ['email', '=', $username],
      ['roles', '=', 1],
      ['status', '=', 1]
    ];

  }
  else{
    $args = [
      ['username', '=', $username],
      ['roles', '=', 1],
      ['status', '=', 1]
    ];
  }
  $row = User::where($args)->first();
  if($row!=null)
  {
    if($row->password==$password)
    {
      $_SESSION['useradmin'] = sha1($username);
      $_SESSION['name'] = $row->name;
      $_SESSION['user_id'] = $row->id;
      $_SESSION['image'] = isset($row->image) ? $row->image : 'user.jpg';
      header('location:index.php');
    }
    else{
      $error_password = 'Mật khẩu không chính xác';
    }
  }
  else{
   
    $error_username = 'Tên đăng nhập không chính xác';
  }
 }
?>










<link rel="stylesheet" href="../public/css/login.css">



<div class="container">
  <div class="left">
    <div class="header">
      <h2 class="animation a1">ĐĂNG NHẬP</h2>
      <h4 class="animation a2">Đăng nhập tài khoản và mật khẩu</h4>
    </div>
    <form action="login.php" method="post">
    <div class="form">
      <input name='username' type="text" class="form-field animation a3" placeholder="Email Address">
      <input name='password' type="password" class="form-field animation a4" placeholder="Password">
      <p class="animation a5"><a href="#">Quên mật khẩu</a></p>
      <button type="submit" name='dangnhap' class="animation a6">LOGIN</button>
    </div>
    </form>
    <p class="animation a5"><a href="registration.php">Đăng ký</a></p>
  </div>
  <div class="right"></div>
</div>
