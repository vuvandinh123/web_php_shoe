<?php 
use App\Models\Banner;
use App\Libraries\Upload;
use App\Libraries\MyClass;

if(isset($_POST['them']))
{
    $banner=new Banner();
    $banner->title = $_POST['title'];
    $banner->link = $_POST['link'];
    $banner->sort_order = $_POST['sort_order'];
    $banner->status = $_POST['status'];
    $banner->created_at = date('Y-m-d H:i:s');
    $banner->created_by = 1;
    $banner->updated_by = 1;
    if (strlen($_FILES['img']['name'])) {
        $args = array(
            'path_dir' => '../public/image/banner/',
            'file' => $_FILES['img'],
            'extention' => ['png', 'jpg', 'webp'],
            'maxsize' => 5000000
        );
        $upload = Upload::saveFile($args);
        if ($upload['success'] == true) {
                $banner->image = $upload['result'];
        }
    }
    $banner->save();
    MyClass::set_flash('message',['type'=>'alert_success','msg'=>'Thêm thành công']);
    header("location:index.php?option=banner");
}



if(isset($_POST['edit']))
{
    $id = $_REQUEST['id'];
    $banner = Banner::find($id);
    $banner->title = $_POST['title'];
    $banner->link = $_POST['link'];
    // $banner->position = $_POST['position'];
    $banner->sort_order = $_POST['sort_order'];
    $banner->status = $_POST['status'];
    $banner->created_at = date('Y-m-d H:i:s');
    if (strlen($_FILES['img']['name'])) {
        $args = array(
            'path_dir' => '../public/image/slide/',
            'file' => $_FILES['img'],
            'extention' => ['png', 'jpg', 'webp'],
            'maxsize' => 5000000
        );
        $upload = Upload::saveFile($args);
        if ($upload['success'] == true) {
                $banner->image = $upload['result'];
        }
    }
    $banner->save();
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'sửa thành công']);
    header("location:index.php?option=banner&sort=desc&page=1");
}

if(isset($_POST['deletes']))
{
    $list = $_POST['check_id'];

   foreach($list as $value)
    {
        
        $banner = Banner::find($value);
        $banner->status = 0;
        $banner->save();
    }
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Thêm vào thùng rác thành công']);
   header('location:?option=banner&sort=desc&page=1');
}

if(isset($_POST['destroys']))
{
    $list = $_POST['check_id'];
    
   foreach($list as $value)
    {
        $category = banner::find($value);
        $category->delete();
    }
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'xóa thành công thành công']);
   header('location:?option=banner&cat=recycle');
}
?>