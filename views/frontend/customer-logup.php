
<?php
require_once('vendor/autoload.php');
require_once('config/database.php');
// session_start();
// $_SESSION['usersiter'] = 'siter';
// if(!isset($_SESSION['usersiter']))
// {
//   header('location:index.php');
// }
use App\Models\User;
$num = 0;
if(isset($_POST['dangky']))
{
  $user['name'] = $_POST['name'];
  $user['username'] =$_POST['username'];
  $user['password'] =sha1($_POST['password']);
  $user['email'] = $_POST['email'];
  $user['image'] = $_POST['image']??'anh1';
  $user['phone'] = $_POST['phone'];
  $user['gender'] = $_POST['gt']??1;

  $num =User::where('username','=',$user['username'])->count();
  if($num!=0)
  {
    $error = "tên tài khoản đã tồn tại";
  }
  else
  {
     User::insert($user);
    header('location: ?option=customer&f=login');
    
  }

}
?>
<?php require_once('views/frontend/header.php') ?>
<style>
.form{
    height: 1000px;
}
.form input{
    height: 50px;
    font-size: 17px;
}
.form button{
    height: 50px;
    font-size: 20px;
}
a{
    display: block;
    height: 50px;
    line-height: 10px;

}
</style>
<div class="container p-5">
<form class="w-50 m-auto form" action="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fs-1">Tên </label>
    <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fs-1">Tên đăng nhập</label>
    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text fs-3">Nhập tài khoản hoặc emali</div>
    <?php if($num!=0): ?>
      <p class="text-danger"><?=$error?></p>
      <?php endif;?>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label fs-1">Mật khẩu</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fs-1">Email</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fs-1">Điện thoại</label>
    <input name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3 d-flex">
    <label for="exampleInputEmail1" class="form-label fs-1 me-3">giới tính: </label>
   NAM:  <input name="gt" value="1" type="radio" class="me-5" id="gt" aria-describedby="emailHelp">
   Nữ: <input name="gt" value="0" type="radio" class="me-5" id="gt" aria-describedby="emailHelp">
    
  </div>
  <button name="dangky" type="submit " class="btn btn-primary w-100">ĐĂNG KÝ</button>
 
</form>
      
</div>

<?php require_once('views/frontend/footer.php') ?>
