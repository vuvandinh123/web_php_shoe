<?php 
use App\Models\Brand;
use App\Libraries\Upload;
use App\Libraries\MyClass;

if(isset($_POST['them']))
{
    $brand=new Brand();
    $brand->name = $_POST['name'];
    $brand->slug =MyClass::create_slug($_POST['name']);
    $brand->metakey = $_POST['metakey'];
    $brand->metadesc = $_POST['metadesc'];
    $brand->sort_order = $_POST['sort_order'];
    $brand->status = $_POST['status'];
    $brand->created_at = date('Y-m-d H:i:s');
    $brand->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
    if (strlen($_FILES['img']['name'])) {
        $args = array(
            'path_dir' => '../public/image/brand/',
            'file' => $_FILES['img'],
            'extention' => ['png', 'jpg', 'webp'],
            'maxsize' => 5000000
        );
        $upload = Upload::saveFile($args);
        if ($upload['success'] == true) {
                $brand->image = $upload['result'];
        }
    }
    $brand->save();
    MyClass::set_flash('message',['type'=>'alert_success','msg'=>'Thêm thành công']);
    header("location:index.php?option=brand&sort=desc&page=1");
}



if(isset($_POST['edit']))
{
    $id = $_POST['id'];
    $brand = Brand::find($id);
    $brand->name = $_POST['name'];
    $brand->slug =MyClass::create_slug($_POST['name']);
    $brand->metakey = $_POST['metakey'];
    $brand->metadesc = $_POST['metadesc'];
    $brand->sort_order = $_POST['sort_order'];
    $brand->status = $_POST['status'];
    $brand->created_at = date('Y-m-d H:i:s');
    $brand->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
    if (strlen($_FILES['img']['name'])) {
        $args = array(
            'path_dir' => '../public/image/brand/',
            'file' => $_FILES['img'],
            'extention' => ['png', 'jpg', 'webp'],
            'maxsize' => 5000000
        );
        $upload = Upload::saveFile($args);
        if ($upload['success'] == true) {
                $brand->image = $upload['result'];
        }
    }
    $brand->save();
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'sửa thành công']);
    header("location:index.php?option=brand&sort=desc&page=1");
}

if(isset($_POST['deletes']))
{
    $list = $_POST['check_id'];
   foreach($list as $value)
    {
        
        $brand = Brand::find($value);
        $brand->status = 0;
        $brand->save();
    }
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Thêm vào thùng rác thành công']);
   header('location:?option=brand&sort=desc&page=1');
}
?>