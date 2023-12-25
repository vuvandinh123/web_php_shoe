<?php 
use App\Models\Post;
use App\Libraries\Upload;
use App\Libraries\MyClass;

if(isset($_POST['them']))
{
    $post=new Post();
    $post->title = $_POST['title'];
    $post->slug =MyClass::create_slug($_POST['title']);
    $post->topic_id = 3;
    $post->detail = $_POST['detail'];
    $post->type = 'page';
    $post->metakey = $_POST['metakey'];
    $post->metadesc = $_POST['metadesc'];
    $post->status = $_POST['status'];
    $post->created_at = date('Y-m-d H:i:s');
    $post->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
    if (strlen($_FILES['img']['name'])) {
        $args = array(
            'path_dir' => '../public/image/post/',
            'file' => $_FILES['img'],
            'extention' => ['png', 'jpg', 'webp'],
            'maxsize' => 5000000
        );
        $upload = Upload::saveFile($args);
        if ($upload['success'] == true) {
                $post->image = $upload['result'];
        }
    }
    $post->save();
    MyClass::set_flash('message',['type'=>'alert_success','msg'=>'Thêm thành công']);
    header("location:index.php?option=page");
}



if(isset($_POST['edit']))
{
    $id = $_REQUEST['id'];
    $post = Post::find($id);
    $post->title = $_POST['title'];
    $post->slug =MyClass::create_slug($_POST['title']);
    $post->topic_id = $_POST['topic_id'];
    $post->detail = $_POST['detail'];
    $post->type = 'page';
    $post->metakey = $_POST['metakey'];
    $post->metadesc = $_POST['metadesc'];
    $post->status = $_POST['status'];
    $post->created_at = date('Y-m-d H:i:s');
    $post->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
    if (strlen($_FILES['img']['name'])) {
        $args = array(
            'path_dir' => '../public/image/post/',
            'file' => $_FILES['img'],
            'extention' => ['png', 'jpg', 'webp'],
            'maxsize' => 5000000
        );
        $upload = Upload::saveFile($args);
        if ($upload['success'] == true) {
                $post->image = $upload['result'];
        }
    }
    $post->save();
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'sửa thành công']);
    header("location:index.php?option=page&sort=desc&page=1");
}

if(isset($_POST['deletes']))
{
    $list = $_POST['check_id'];

   foreach($list as $value)
    {
        
        $post = Post::find($value);
        $post->status = 0;
        $post->save();
    }
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Thêm vào thùng rác thành công']);
   header('location:?option=page&sort=desc&page=1');
}
?>