<?php

use App\Models\User;
use App\Libraries\MyClass;
use App\Libraries\Upload;

$id = $_REQUEST['id'];
$list_user = User::where([['status', '!=', '0'], ['id', '!=', $id]])->get();
$user = User::find($id);
if ($user == null) {
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Danh mục không tồn tại']);
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
                    <h1>Chi tiết tài khoản</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Chi tiết tài khoản</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between mb-3">

                    <style>
                    .back {
                        display: flex;
                        height: 3em;
                        width: 100px;
                        align-items: center;
                        justify-content: center;
                        background-color: #eeeeee4b;
                        border-radius: 3px;
                        letter-spacing: 1px;
                        transition: all 0.2s linear;
                        cursor: pointer;
                        border: none;
                        background: #fff;
                    }

                    .back>svg {
                        margin-right: 5px;
                        margin-left: 5px;
                        font-size: 20px;
                        transition: all 0.4s ease-in;
                    }

                    .back:hover>svg {
                        font-size: 1.2em;
                        transform: translateX(-5px);
                    }

                    .back:hover {
                        box-shadow: 9px 9px 33px #d1d1d1, -9px -9px 33px #ffffff;
                        transform: translateY(-2px);
                    }
                    </style>
                    <!-- <a title="Quay lại" class="btn bg-primary rounded-0" href="?option=user&sort=desc&page=1"> -->
                    <!-- <img width="20px" height="20px" src="../public/image/icon/arrow.png" alt=""> Quay lại</a> -->
                    <a title="Quay lại" href="?option=user&sort=desc&page=1" class="back">
                        <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1"
                            viewBox="0 0 1024 1024">
                            <path
                                d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z">
                            </path>
                        </svg>
                        <span>Quay lại</span>
                    </a>
                    <div>
                        <a title="sửa" href="?option=user&cat=edit&id=<?=$id?>" class="btn bg-primary rounded-0 "><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a title="Thêm vào thùng rác" href="?option=user&cat=delete&id=<?=$id?>"
                            class="btn bg-danger rounded-0"><i class="fa-solid fa-trash"></i></a>
                    </div>


                </div>
                <div class="d-flex justify-content-between"></div>
            </div>
            <div class="card-body">

                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="bg-info">
                            <th scope="col">Trường</th>
                            <th scope="col">Giá trị</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">id</th>
                            <td><?=$user->id?></td>
                        </tr>
                        <tr>
                            <th scope="row">Họ và tên</th>
                            <td><?=$user->name?></td>
                        </tr>
                        <tr>
                            <th scope="row">Tên tài khoản</th>
                            <td><?=$user->username?></td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td><?=$user->email?></td>
                        </tr>
                        <tr>
                            <th scope="row">Địa chỉ</th>
                            <td><?=$user->address?></td>
                        </tr>
                        
                        <tr>
                            <th scope="row">Gới tính</th>
                            <td><?=$user->gender?></td>
                        </tr>
                        <tr>
                            <th scope="row">Hình ảnh</th>
                            <td><?=$user->image?></td>
                        </tr>
                        <tr>
                            <th scope="row">Điện thoại</th>
                            <td><?=$user->phone?></td>
                        </tr>
                 
                        <tr>
                            <th scope="row">Ngày tạo</th>
                            <td><?=date_format($user->created_at,"H:i:s d/m/Y ") ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Người tạo</th>
                            <td><?=$user->created_by?></td>
                        </tr>
                        <tr>
                            <th scope="row">Ngày sửa</th>
                            <td><?=date_format($user->updated_at,"H:i:s d/m/Y ") ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Người sửa</th>
                            <td><?=$user->updated_by?></td>
                        </tr>
                        <tr>
                            <th scope="row">Trạng thái</th>
                            <td><?=$user->status?></td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>

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