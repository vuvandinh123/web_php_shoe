<?php 
use App\Models\Order;
use App\Libraries\Upload;
use App\Libraries\MyClass;


if(isset($_POST['deletes']))
{
    $list = $_POST['check_id'];

   foreach($list as $value)
    {
        
        $order = Order::find($value);
        $order->status = 0;
        $order->save();
    }
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Thêm vào thùng rác thành công']);
   header('location:?option=order&sort=desc&page=1');
}

if(isset($_POST['destroys']))
{
    $list = $_POST['check_id'];
    
   foreach($list as $value)
    {
        $category = order::find($value);
        $category->delete();
    }
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'xóa thành công thành công']);
   header('location:?option=order&cat=recycle');
}
?>