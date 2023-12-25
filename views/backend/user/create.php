<?php

use App\Models\User;
use App\Libraries\Upload;
use App\Libraries\MyClass;
$list_user = User::where('status', '!=', 0)->get();
$html_parent_id = '';
$html_sort_order = '';
foreach ($list_user as $value) {
    $html_parent_id .= "<option value='" . $value->id . "'>" . $value->name . "</option>";
    $html_sort_order .= "<option value='" . $value->sort_order . "'>Sau: " . $value->name . "</option>";
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
                    <h1 class="font-weight-bold text-danger">Thêm tài khoản quản trị</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="?option=user&sort=desc&page=1">Danh mục</a></li>
                        <li class="breadcrumb-item active">Thêm sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
            <div class="d-flex justify-content-between mb-3">


<a title="Quay lại" class="btn bg-primary rounded-0 fw-bold" href="?option=user&sort=desc&page=1">
    <img width="20px" height="20px" src="../public/image/icon/arrow.png" alt=""> Quay lại </a>
<div>
<p title="Lưu" class="btn rounded-0 m-0 p-0">
    <img width="20px" height="20px" src="../public/image/icon/diskette.png" alt=""></p>
</div>


</div>
            </div>
            <div class="card-body">

                <form action="?option=user&cat=process" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-9 m-auto">
                            <div class="form-group">
                                <label for="input1">Họ và tên</label>
                                <input id="input1" type="text" name="name" class="form-control" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="input2">Tên tài khoản</label>
                                <input id="input2" type="text" name="username" class="form-control" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                            <label for="input3">Mật khẩu</label>
                                <input id="input3" type="password" name="password" class="form-control" placeholder="Mật khẩu">
                            </div>
                            <div class="form-group">
                            <label for="input4">Email</label>
                                <input id="input4" type="email" name="email" class="form-control" placeholder="Nhập email">
                            </div>
                            <div class="form-group">
                            <label for="input4">Điện thoại</label>
                                <input id="input4" type="text" name="phone" class="form-control" placeholder="Nhập số diện thoại">
                            </div>
                        </div>
                        
                    </div>
                    <div class="d-flex justify-content-between">
                    <input name="them" class="btn bg-danger" type="submit" value="Thêm">
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