<?php 
use App\Models\Topic;
use App\Libraries\Upload;
use App\Libraries\MyClass;

if(isset($_POST['them']))
{
    $topic=new Topic();
    $topic->name = $_POST['name'];
    $topic->slug =MyClass::create_slug($_POST['name']);
    $topic->metakey = $_POST['metakey'];
    $topic->metadesc = $_POST['metadesc'];
    $topic->parent_id = $_POST['parent_id'];
    $topic->sort_order = $_POST['sort_order'];
    $topic->status = $_POST['status'];
    $topic->created_at = date('Y-m-d H:i:s');
    $topic->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
    if (strlen($_FILES['img']['name'])) {
        $args = array(
            'path_dir' => '../public/image/topic/',
            'file' => $_FILES['img'],
            'extention' => ['png', 'jpg', 'webp'],
            'maxsize' => 5000000
        );
        $upload = Upload::saveFile($args);
        if ($upload['success'] == true) {
                $topic->image = $upload['result'];
        }
    }
    $topic->save();
    MyClass::set_flash('message',['type'=>'alert_success','msg'=>'Thêm thành công']);
    header("location:index.php?option=topic&sort=desc&page=1");
}



if(isset($_POST['edit']))
{
    $id = $_POST['id'];
    $topic = Topic::find($id);
    $topic->name = $_POST['name'];
    $topic->slug =MyClass::create_slug($_POST['name']);
    $topic->metakey = $_POST['metakey'];
    $topic->metadesc = $_POST['metadesc'];
    $topic->parent_id = $_POST['parent_id'];
    $topic->sort_order = $_POST['sort_order'];
    $topic->status = $_POST['status'];
    $topic->created_at = date('Y-m-d H:i:s');
    $topic->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
    $topic->save();
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'sửa thành công']);
    header("location:index.php?option=topic&sort=desc&page=1");
}

if(isset($_POST['deletes']))
{
    $list = $_POST['check_id'];

   foreach($list as $value)
    {
        
        $topic = Topic::find($value);
        $topic->status = 0;
        $topic->save();
    }
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Thêm vào thùng rác thành công']);
   header('location:?option=topic&sort=desc&page=1');
}
?>