<?php 

use App\Models\User;
use App\Libraries\MyClass;
use App\Libraries\Upload;
$id = $_REQUEST['id'];
$list_user = User::where([['status', '!=', '0'], ['id', '!=', $id]])->get();
$user = User::find($id);
if($user == null)
{
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Danh mục không tồn tại']);
     header("location:index.php?option=user");
}


?>
<?php 

?>

<?php require_once("../views/backend/header.php") ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa thông tin tài khoản Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sửa thông tin tài khoản Admin</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <style>
    #id {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }
    </style>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between mb-3">


                    <a title="Quay lại" class="btn bg-primary rounded-0" href="?option=user&sort=desc&page=1">
                        <img width="20px" height="20px" src="../public/image/icon/arrow.png" alt=""> Quay lại</a>
                    <div>
                        <a title="sửa" href="?option=user&cat=edit&id=<?=$id?>" class="btn bg-primary rounded-0 "><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a title="Thêm vào thùng rác" href="?option=user&cat=delete&id=<?=$id?>"
                            class="btn bg-danger rounded-0"><i class="fa-solid fa-trash"></i></a>
                    </div>


                </div>
            </div>
            <div class="card-body">

            <form action="?option=user&cat=process&id=<?=$id?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-9 m-auto">
                            <div class="form-group">
                                <label for="input1">Họ và tên</label>
                                <input id="input1" type="text" value="<?=$user->name?>" name="name" class="form-control" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                            <label for="input4">Email</label>
                                <input id="input4"value="<?=$user->email?>" type="email" name="email" class="form-control" placeholder="Nhập email">
                            </div>
                            <div class="form-group">
                            <label for="input4">Điện thoại</label>
                                <input id="input4"value="<?=$user->phone?>" type="text" name="phone" class="form-control" placeholder="Nhập số diện thoại">
                            </div>
                        </div>
                        
                    </div>
                    <div class="d-flex justify-content-between">
                    <input name="edit" class="btn bg-danger" type="submit" value="Thêm">
                    <input class="btn bg-info" type="reset" value="Hủy">
                    </div>
                   
                </form>
            </div>

        </div>
</div>
<!-- /.card-body -->

<div class="card-footer">


</div>
<!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>

<?php require_once("../views/backend/footer.php") ?>