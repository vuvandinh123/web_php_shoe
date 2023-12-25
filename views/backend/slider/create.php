<?php

use App\Models\Slider;
use App\Libraries\Upload;
use App\Libraries\MyClass;
$list_slider = Slider::where('status', '!=', 0)->get();
$html_position = '';
$html_sort_order = '';
foreach ($list_slider as $value) {
    $html_sort_order .= "<option value='" . $value->sort_order+1 . "'> sau: " . $value->name . "</option>";
    $html_position .= "<option value='" . $value->position . "'> " . $value->position . "</option>";
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
                    <h1 class="font-weight-bold text-danger">Thêm slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="?option=slider&sort=desc&page=1">slider</a></li>
                        <li class="breadcrumb-item active">Thêm slider</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between mb-3">


                    <a title="Quay lại" class="btn bg-primary rounded-0 fw-bold" href="?option=slider&sort=desc&page=1">
                        <img width="20px" height="20px" src="../public/image/icon/arrow.png" alt=""> Quay lại </a>
                    <div>
                        <p title="Lưu" class="btn rounded-0 m-0 p-0">
                            <img width="20px" height="20px" src="../public/image/icon/diskette.png" alt="">
                        </p>
                    </div>


                </div>
            </div>
            <div class="card-body">

                <form action="?option=slider&cat=process" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="input1">Tên slider</label>
                                <input id="input1" type="text" name="name" class="form-control"
                                    placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="input2">Liên kết</label>
                                <input id="input2" type="text" name="link" class="form-control"
                                    placeholder="Nhập link">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="input4">vị trí</label>
                                        <input id="input4" name="position" readonly class="form-control"
                                            id="exampleFormControlSelect1" value="slider show">
                                            
                                      
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="input5">sắp xếp</label>
                                        <select id="input5" name="sort_order" class="form-control"
                                            id="exampleFormControlSelect1">
                                            <?= $html_sort_order ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="file">Hình</label>
                            <input name="img" type="file" class="form-control-file" id="file">
                        </div>

                        <div class="form-group">
                            <label for="input6">Trạng thái</label>
                            <select id="input6" name="status" class="form-control" id="exampleFormControlSelect1">
                                <option value="1">Xuất bản</option>
                                <option value="0">không xuất bản</option>
                            </select>
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