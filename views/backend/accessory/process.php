<?php 
use App\Models\Product;
use App\Libraries\Upload;
use App\Libraries\MyClass;
use App\Models\Image;

if(isset($_POST['them']))
{
    $product=new Product();
    $product->name = $_POST['name'];
    $product->slug =MyClass::create_slug($_POST['name']);
    $product->detail = $_POST['detail'];
    $product->metakey = $_POST['metakey'];
    $product->metadesc = $_POST['metadesc'];
    $product->category_id = $_POST['category_id'];
    $product->brand_id = $_POST['brand_id'];
    $product->price = $_POST['price'];
    $product->pricesale = $_POST['pricesale'];
    $product->qty = $_POST['qty'];
    $product->status = $_POST['status'];
    $product->created_at = date('Y-m-d H:i:s');
    $product->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
    if (strlen($_FILES['img']['name'])) {
        $args = array(
            'path_dir' => '../public/image/product/',
            'file' => $_FILES['img'],
            'extention' => ['png', 'jpg', 'webp'],
            'maxsize' => 5000000,
            'rename'=>$product->slug
        );
        $upload = Upload::saveFile($args);
        if ($upload['success'] == true) {
                $product->image = $upload['result'];
        }
    }
    $product->save();
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Thêm thành công']);
    header("location:index.php?option=accessory");
}

if(isset($_POST['edit']))
{
    $id = $_REQUEST['id'];
    
    $product = Product::find($id);
    $product->name = $_POST['name'];
    $product->slug =MyClass::create_slug($_POST['name']);
    $product->detail = $_POST['detail'];
    $product->metakey = $_POST['metakey'];
    $product->metadesc = $_POST['metadesc'];
    $product->category_id = $_POST['category_id'];
    $product->brand_id = $_POST['brand_id'];
    $product->price = $_POST['price'];
    $product->pricesale = $_POST['pricesale'];
    $product->qty = $_POST['qty'];
    $product->status = $_POST['status'];
    $product->created_at = date('Y-m-d H:i:s');
    $product->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);
    if (strlen($_FILES['img']['name'])) {
        $args = array(
            'path_dir' => '../public/image/product/',
            'file' => $_FILES['img'],
            'extention' => ['png', 'jpg', 'webp'],
            'maxsize' => 5000000,
            'rename'=>$product->slug
        );
        $upload = Upload::saveFile($args);
        if ($upload['success'] == true) {
                $product->image = $upload['result'];
        }
    }
    $product->save();
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Sửa thành công']);
    header("location:index.php?option=accessory");
}

if(isset($_POST['deletes']))
{
    $list = $_POST['check_id'];

   foreach($list as $value)
    {
        
        $product = Product::find($value);
        $product->status = 0;
        $product->save();
    }
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Thêm vào thùng rác thành công']);
   header('location:?option=accessory&sort=desc&page=1');
}
?>
<?php 
if (isset($_POST['images'])) {
    $id=$_REQUEST['id'];
    $name = array();
    $tmp_name = array();
    $error = array();
    $ext = array();
    $size = array();
    foreach ($_FILES['file']['name'] as $file) {
        $name[] = $file;
    }
    foreach ($_FILES['file']['tmp_name'] as $file) {
        $tmp_name[] = $file;
    }
    foreach ($_FILES['file']['error'] as $file) {
        $error[] = $file;
    }
    foreach ($_FILES['file']['type'] as $file) {
        $ext[] = $file;
    }
    foreach ($_FILES['file']['size'] as $file) {
        $size[] = round($file / 1024, 2);
    } //Phần này lấy giá trị ra từng mảng nhỏ
 
for ($i = 0; $i < count($name); $i++) 
{
    if ($error[$i] < 0) {
    echo "Lỗi: " . $error[$i];
    } else
    // if ($ext[$i] != 'application/save') {
    // echo "File không được hổ trợ" . $ext[$i];
    // } else {
    $temp = preg_split('/[\/\\\\]+/', $name[$i]);
    $filename = $temp[count($temp) - 1];
    $upload_dir = "../public/image/product/";
    $upload_file = $upload_dir . $filename;
    if (file_exists($upload_file)) {
        MyClass::set_flash('message',['type'=>'alert-danger','msg'=>'File đã tồn tại']);
        header('location:?option=accessory&cat=addimage&id='.$id);
    } else {
    if (move_uploaded_file($tmp_name[$i], $upload_file)) {
   
                        $img = new Image();
                        $img->id_product= $id;
                        $img->name = $name[$i];
                        $img->slug = MyClass::create_slug($name[$i]);
                        $img->save();
                header('location:?option=accessory&cat=addimage&id='.$id);

} else
echo 'loi';
}
} //End khoi cau lenh up file va them vao CSDL;
} //End vong lap for cho tat ca cac file;
echo '</p>';
//}


if(isset($_POST['deleteimg']))
{ $id=$_REQUEST['id'];
    $list = $_POST['check_id'];

   foreach($list as $value)
    {
        
        $image = image::find($value);
        Upload::deleteFile(['path_dir'=>'../public/image/product/','file'=>$image->name ]);
        $image->delete();
        
    }
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Xóa thành công']);
   header('location:?option=accessory&cat=addimage&id='.$id);
}
?>