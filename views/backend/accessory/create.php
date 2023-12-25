<?php

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

$list_category = category::where('status', '!=', 0)->get();
$list_Brand = Brand::where('status', '!=', 0)->get();
$html_parent_id = '';
$html_parent_id2 = '';
foreach ($list_category as $value) {
    $html_parent_id .= "<option value='" . $value->id . "'>" . $value->name . "</option>";
}
foreach ($list_Brand as $value) {
    $html_parent_id2 .= "<option value='" . $value->id . "'>" . $value->name . "</option>";
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
                    <h1 class="font-weight-bold text-danger">Thêm sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="?option=accessory&sort=desc&page=1">Danh mục</a></li>
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


                    <a title="Quay lại" class="btn bg-primary rounded-0 fw-bold"
                        href="?option=accessory&sort=desc&page=1">
                        <img width="20px" height="20px" src="../public/image/icon/arrow.png" alt=""> Quay lại </a>
                    <div>
                        <p title="Lưu" class="btn rounded-0 m-0 p-0">
                            <img width="20px" height="20px" src="../public/image/icon/diskette.png" alt="">
                        </p>
                    </div>


                </div>
            </div>
            <div class="card-body">

                <form action="?option=accessory&cat=process" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="input1">Tên Sản Phẩm</label>
                                <input id="input1" type="text" name="name" class="form-control"
                                    placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="input2">Chi tiết</label>
                                <textarea id="area" name="detail" class="form-control" placeholder="Từ khóa" id="input2"
                                    rows="6"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="input2">Từ khóa</label>
                                <textarea name="metakey" class="form-control" placeholder="Từ khóa" id="input2"
                                    rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="input3">Mô tả</label>
                                <textarea name="metadesc" class="form-control" placeholder="Mô tả" id="input3"
                                    rows="3"></textarea>
                            </div>

                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="input4">Danh mục</label>
                                <select id="input4" name="category_id" class="form-control"
                                    id="exampleFormControlSelect1">
                                    <?= $html_parent_id ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="input5">Thương hiệu</label>
                                <select id="input5" name="brand_id" class="form-control" id="exampleFormControlSelect1">
                                    <?= $html_parent_id2 ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="input6">Giá sản phẩm</label>
                                <input id="input6" type="text" name="price" class="form-control" placeholder="Nhập Gía">
                            </div>
                            <div class="form-group">
                                <label for="input7">Giá khuyến mại</label>
                                <input id="input7" type="text" name="pricesale" class="form-control"
                                    placeholder="Nhập giá khuyến mại">
                            </div>
                            <div class="form-group">
                                <label for="input8">Số lượng</label>
                                <input id="input8" type="number" min="1" value="1" name="qty" class="form-control"
                                    placeholder="số luọng">
                            </div>
                            <div class="form-group">
                                <label for="file">Hình</label>
                                <input name="img" type="file" class="form-control-file" id="file">
                            </div>
                            

                            <div class="form-group">
                                <label for="input9">Trạng thái</label>
                                <select id="input9" name="status" class="form-control" id="exampleFormControlSelect1">
                                    <option value="1">Xuất bản</option>
                                    <option value="0">Ẩn</option>
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