<?php 

use App\Models\Contact;
use App\Libraries\MyClass;
use App\Libraries\Upload;
$id = $_REQUEST['id'];
$list_contact = Contact::where('status', '!=', '0')->get();
$contact = Contact::find($id);
if($contact == null)
{
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Danh mục không tồn tại']);
     header("location:index.php?option=contact");
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
                    <h1>Trả lời liên hệ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sửa danh mục</li>
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


                    <a title="Quay lại" class="btn bg-primary rounded-0" href="?option=contact&sort=desc&page=1">
                        <img width="20px" height="20px" src="../public/image/icon/arrow.png" alt=""> Quay lại</a>
                    <div>
                        <a title="sửa" href="?option=contact&cat=edit&id=<?=$id?>" class="btn bg-primary rounded-0 "><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a title="Thêm vào thùng rác" href="?option=contact&cat=delete&id=<?=$id?>"
                            class="btn bg-danger rounded-0"><i class="fa-solid fa-trash"></i></a>
                    </div>


                </div>
            </div>
            <div class="card-body">

                <form action="?option=contact&cat=process" method="post" enctype="multipart/form-data">
                    <input name='id' id='id' type="number" value="<?=$id?>">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="input1">Họ và Tên</label>
                                <input id="input1" value="<?=$contact->name?>" readonly type="text" name="name"
                                    class="form-control" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="input2">Email</label>
                                <input id="input2" value="<?=$contact->email?>" readonly type="email" name="email"
                                    class="form-control" placeholder="Nhập tên danh mục">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="input3">Điện thoại</label>
                                <input id="input3" value="<?=$contact->phone?>" readonly type="text" name="phone"
                                    class="form-control" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="input4">Tiêu đề</label>
                                <input id="input4" value="<?=$contact->title?>" readonly type="text" name="title"
                                    class="form-control" placeholder="Nhập tên danh mục">
                            </div>
                        </div>
                        <div class="form-group w-100">
                                <label for="input5">Nội dung câu hỏi</label>
                                <textarea id="input5" value="" readonly name="detail"
                                    class="form-control" placeholder="Nhập tên danh mục"><?=$contact->detail?></textarea>
                        </div>
                            <div class="form-group w-100">
                                <label for="input5">Trả lời</label>
                                <textarea id="input5" value=""  name="replaydetail"
                                    class="form-control" placeholder="Trả lời" rows="4"><?=$contact->replaydetail?></textarea>
                            </div>
                        
                    </div>
                    <div class="d-flex justify-content-between">
                        <input name="edit" class="btn bg-danger" type="submit" value="Trả lời">
                        
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