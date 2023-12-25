
<?php
require_once('vendor/autoload.php');
require_once('config/database.php');

use App\Models\User;
if(isset($_POST['dangnhap']))
{
  $username = $_POST['username'];
  $password =sha1($_POST['password']);
  if(filter_var($username,FILTER_VALIDATE_EMAIL))
  {
    $args = [
      ['email', '=', $username],
      ['password', '=', $password],
      ['roles', '=', 0],
      ['status', '=', 2]
    ];

  }
  else{
    $args = [
      ['username', '=', $username],
      ['password', '=', $password],
      ['roles', '=', 0],
      ['status', '=', 2]
    ];
  }
  $row = User::where($args)->first();
  if($row!=null)
  {
    
      $_SESSION['usersiter'] = $username;
      $_SESSION['name'] = $row->name;
      $_SESSION['user_id'] = $row->id;
      $_SESSION['image'] = $row->image;
      $_SESSION['cover_image'] = $row->cover_image;
      $_SESSION['created_at'] =date_format($row->created_at," d/m/Y ") ;
      $_SESSION['phone'] = $row->phone;
      $_SESSION['address'] = $row->address;
      $_SESSION['email'] = $row->email;

      header('location:index.php');
  }
  }
  else{
    $error_username = 'Tên đăng nhập hoặc mật khẩu không chính xác! ';
  }
?>

<?php require_once('views/frontend/header.php') ?>
<style>
.form{
    height: 500px;
}
.form input{
    height: 50px;
    font-size: 17px;
}
.form button{
    height: 50px;
    font-size: 20px;
}

</style>
<div class="container p-5">
  <?php if(!isset( $_SESSION['usersiter'])): ?>
<form class="w-50 m-auto form" action="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fs-1">Tên đăng nhập</label>
    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text fs-3">Nhập mật khẩu hoặc emali</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label fs-1">Mật khẩu</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button name="dangnhap" type="submit " class="btn btn-primary w-100">ĐĂNG NHẬP</button>
  <a class="btn bg-danger my-5  text-white fs-3" href="?option=customer&f=logup">đăng ký</a>
</form>
    <?php else: ?>
      <div class="alert alert-success" role="alert">
    Bạn đã đăng nhập
</div>
      <?php endif;?>
      
</div>

<?php require_once('views/frontend/footer.php') ?>
