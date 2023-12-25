<?php 
use App\Models\Slider;
use App\Libraries\Upload;
use App\Libraries\MyClass;

if(isset($_POST['them']))
{
    $slider=new Slider();
    $slider->name = $_POST['name'];
    $slider->link = $_POST['link'];
    $slider->position = $_POST['position'];
    $slider->sort_order = $_POST['sort_order'];
    $slider->status = $_POST['status'];
    $slider->created_at = date('Y-m-d H:i:s');
    $slider->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
    if (strlen($_FILES['img']['name'])) {
        $args = array(
            'path_dir' => '../public/image/slide/',
            'file' => $_FILES['img'],
            'extention' => ['png', 'jpg', 'webp'],
            'maxsize' => 5000000
        );
        $upload = Upload::saveFile($args);
        if ($upload['success'] == true) {
                $slider->image = $upload['result'];
        }
    }
    $slider->save();
    MyClass::set_flash('message',['type'=>'alert_success','msg'=>'Thêm thành công']);
    header("location:index.php?option=slider");
}



if(isset($_POST['edit']))
{
    $id = $_REQUEST['id'];
    $slider = Slider::find($id);
    $slider->name = $_POST['name'];
    $slider->link = $_POST['link'];
    $slider->position = $_POST['position'];
    $slider->sort_order = $_POST['sort_order'];
    $slider->status = $_POST['status'];
    $slider->created_at = date('Y-m-d H:i:s');
    $slider->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
    if (strlen($_FILES['img']['name'])) {
        $args = array(
            'path_dir' => '../public/image/slide/',
            'file' => $_FILES['img'],
            'extention' => ['png', 'jpg', 'webp'],
            'maxsize' => 5000000
        );
        $upload = Upload::saveFile($args);
        if ($upload['success'] == true) {
                $slider->image = $upload['result'];
        }
    }
    $slider->save();
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'sửa thành công']);
    header("location:index.php?option=slider&sort=desc&page=1");
}

if(isset($_POST['deletes']))
{
    $list = $_POST['check_id'];

   foreach($list as $value)
    {
        
        $slider = Slider::find($value);
        $slider->status = 0;
        $slider->save();
    }
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Thêm vào thùng rác thành công']);
   header('location:?option=slider&sort=desc&page=1');
}

if(isset($_POST['destroys']))
{
    $list = $_POST['check_id'];
    
   foreach($list as $value)
    {
        $category = slider::find($value);
        $category->delete();
    }
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'xóa thành công thành công']);
   header('location:?option=slider&cat=recycle');
}
?>