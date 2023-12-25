<?php 
use App\Models\Contact;
use App\Libraries\Upload;
use App\Libraries\MyClass;

if(isset($_POST['them']))
{
    $contact=new Contact();
    $contact->name = $_POST['name'];
    $contact->slug =MyClass::create_slug($_POST['name']);
    $contact->metakey = $_POST['metakey'];
    $contact->metadesc = $_POST['metadesc'];
    $contact->parent_id = $_POST['parent_id'];
    $contact->sort_order = $_POST['sort_order'];
    $contact->level = 1;
    $contact->status = $_POST['status'];
    $contact->created_at = date('Y-m-d H:i:s');
    $contact->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
    if (strlen($_FILES['img']['name'])) {
        $args = array(
            'path_dir' => '../public/image/contact/',
            'file' => $_FILES['img'],
            'extention' => ['png', 'jpg', 'webp'],
            'maxsize' => 5000000
        );
        $upload = Upload::saveFile($args);
        if ($upload['success'] == true) {
                $contact->image = $upload['result'];
        }
    }
    $contact->save();
    MyClass::set_flash('message',['type'=>'alert_success','msg'=>'Thêm thành công']);
    header("location:index.php?option=contact");
}



if(isset($_POST['edit']))
{
    $id = $_POST['id'];
    $contact = Contact::find($id);
    $contact->name = $_POST['name'];
    $contact->phone = $_POST['phone'];
    $contact->email = $_POST['email'];
    $contact->title = $_POST['title'];
    $contact->detail = $_POST['detail'];
    $contact->replaydetail = $_POST['replaydetail'];
    $contact->status = 2;
    $contact->created_at = date('Y-m-d H:i:s');
    $contact->updated_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
    $contact->save();
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Trả lời thành công']);
    header("location:index.php?option=contact&sort=desc&page=1");
}

if(isset($_POST['deletes']))
{
    $list = $_POST['check_id'];

   foreach($list as $value)
    {
        
        $contact = Contact::find($value);
        $contact->status = 0;
        $contact->save();
    }
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Thêm vào thùng rác thành công']);
   header('location:?option=contact&sort=desc&page=1');
}
if(isset($_POST['destroys']))
{
    $list = $_POST['check_id'];
    
   foreach($list as $value)
    {
        $category = contact::find($value);
        $category->delete();
    }
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'xóa thành công thành công']);
   header('location:?option=contact&cat=recycle');
}
?>