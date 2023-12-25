<?php

use App\Models\Slider;
use App\Libraries\MyClass;
use App\Libraries\Upload;

$id = $_REQUEST['id'];
$list_slider = Slider::where([['status', '!=', '0'], ['id', '!=', $id]])->get();
$slider = Slider::find($id);
if ($slider == null) {
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Danh mục không tồn tại']);
    header("location:index.php?option=slider");
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
                    <h1>Chi tiết slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="index.php?option=slider&page=1">slider</a></li>
                        <li class="breadcrumb-item active">Chi tiết slider</li>
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
                    
                    <a title="Quay lại" href="?option=slider&page=1" class="back">
                        <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1"
                            viewBox="0 0 1024 1024">
                            <path
                                d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z">
                            </path>
                        </svg>
                        <span>Quay lại</span>
                    </a>
                    <div>
                        <a title="sửa" href="?option=slider&cat=edit&id=<?=$id?>" class="btn bg-primary rounded-0 "><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a title="Thêm vào thùng rác" href="?option=slider&cat=delete&id=<?=$id?>"
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
                            <td><?=$slider->id?></td>
                        </tr>
                        <tr>
                            <th scope="row">Tên slider</th>
                            <td><?=$slider->name?></td>
                        </tr>
                        <tr>
                            <th scope="row">link</th>
                            <td><?=$slider->link?></td>
                        </tr>
                        <tr>
                            <th scope="row">Hình ảnh</th>
                            <td><?=$slider->image?></td>
                        </tr>
                        <tr>
                            <th scope="row">vị trí</th>
                            <td><?=$slider->position?></td>
                        </tr>
                        <tr>
                            <th scope="row">Sắp xếp</th>
                            <td><?=$slider->sort_order?></td>
                        </tr>
                        <tr>
                            <th scope="row">ngày tạo</th>
                            <td><?=date_format($slider->created_at,"H:i:s d/m/Y ") ?></td>
                        </tr>
                        
                        <tr>
                            <th scope="row">Người tạo</th>
                            <td><?=$slider->created_at?></td>
                        </tr>
                       
                        <tr>
                            <th scope="row">Ngày sửa</th>
                            <td><?=date_format($slider->updated_at,"H:i:s d/m/Y ") ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Người sửa</th>
                            <td><?=$slider->updated_by?></td>
                        </tr>
                        <tr>
                            <th scope="row">Trạng thái</th>
                            <td><?=$slider->status?></td>
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