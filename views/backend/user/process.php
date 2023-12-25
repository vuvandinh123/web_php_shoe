<?php 
use App\Models\User;
use App\Libraries\Upload;
use App\Libraries\MyClass;

if(isset($_POST['them']))
{
    $user=new User();
    $user->name = $_POST['name'];
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    $user->email = $_POST['email'];
    $user->phone = $_POST['phone'];
    $user->image = 'user4.png';
    $user->roles = 1;
    $user->gender = 1;
    $user->status = 1;
    $user->created_at = date('Y-m-d H:i:s');
    $user->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
    $user->save();
    MyClass::set_flash('message',['type'=>'alert_success','msg'=>'Thêm thành công']);
    header("location:index.php?option=user&sort=desc&page=1");
}



if(isset($_POST['edit']))
{
    $id = $_REQUEST['id'];
    $user = User::find($id);
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->phone = $_POST['phone'];
    $user->created_at = date('Y-m-d H:i:s');
    $user->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
    $user->save();
    MyClass::set_flash('message',['type'=>'alert_success','msg'=>'Thêm thành công']);
    header("location:index.php?option=user&sort=desc&page=1");
}

if(isset($_POST['deletes']))
{
    $list = $_POST['check_id'];

   foreach($list as $value)
    {
        
        $user = User::find($value);
        $user->status = 0;
        $user->save();
    }
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Thêm vào thùng rác thành công']);
   header('location:?option=user&sort=desc&page=1');
}
?>