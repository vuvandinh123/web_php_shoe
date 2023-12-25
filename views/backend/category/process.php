<?php 
use App\Models\Category;
use App\Libraries\Upload;
use App\Libraries\MyClass;

if(isset($_POST['them']))
{
    $category=new Category();
    $category->name = $_POST['name'];
    $category->slug =MyClass::create_slug($_POST['name']);
    $category->metakey = $_POST['metakey'];
    $category->metadesc = $_POST['metadesc'];
    $category->parent_id = $_POST['parent_id'];
    $category->sort_order = $_POST['sort_order'];
    $category->level = 1;
    $category->status = $_POST['status'];
    $category->created_at = date('Y-m-d H:i:s');
    $category->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
    if (strlen($_FILES['img']['name'])) {
        $args = array(
            'path_dir' => '../public/image/category/',
            'file' => $_FILES['img'],
            'extention' => ['png', 'jpg', 'webp'],
            'maxsize' => 5000000
        );
        $upload = Upload::saveFile($args);
        if ($upload['success'] == true) {
                $category->image = $upload['result'];
        }
    }
    $category->save();
    MyClass::set_flash('message',['type'=>'alert_success','msg'=>'Thêm thành công']);
    header("location:index.php?option=category");
}



if(isset($_POST['edit']))
{
    $id = $_POST['id'];
    $category = Category::find($id);
    $category->name = $_POST['name'];
    $category->slug =MyClass::create_slug($_POST['name']);
    $category->metakey = $_POST['metakey'];
    $category->metadesc = $_POST['metadesc'];
    $category->parent_id = $_POST['parent_id'];
    $category->sort_order = $_POST['sort_order'];
    $category->level = 1;
    $category->status = $_POST['status'];
    $category->created_at = date('Y-m-d H:i:s');
    $category->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
    if (strlen($_FILES['img']['name'])) {
        $args = array(
            'path_dir' => '../public/image/category/',
            'file' => $_FILES['img'],
            'extention' => ['png', 'jpg', 'webp'],
            'maxsize' => 5000000
        );
        $upload = Upload::saveFile($args);
        if ($upload['success'] == true) {
                $category->image = $upload['result'];
        }
    }
    $category->save();
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'sửa thành công']);
    header("location:index.php?option=category&sort=desc&page=1");
}

if(isset($_POST['deletes']))
{
    $list = $_POST['check_id'];
   foreach($list as $value)
    {
        
        $category = Category::find($value);
        $category->status = 0;
        $category->save();
    }
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Thêm vào thùng rác thành công']);
   header('location:?option=category&sort=desc&page=1');
}
?>