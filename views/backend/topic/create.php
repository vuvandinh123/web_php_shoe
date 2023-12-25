<?php

use App\Models\Topic;
use App\Libraries\Upload;
use App\Libraries\MyClass;
$list_topic = Topic::where('status', '!=', 0)->get();
$html_parent_id = '';
$html_sort_order = '';
foreach ($list_topic as $value) {
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
                    <h1 class="font-weight-bold text-danger">Thêm chủ đề bài viết</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="?option=topic&sort=desc&page=1">Chủ đề</a></li>
                        <li class="breadcrumb-item active">Thêm chủ đề bài viết</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
            <div class="d-flex justify-content-between mb-3">


<a title="Quay lại" class="btn bg-primary rounded-0 fw-bold" href="?option=topic&sort=desc&page=1">
    <img width="20px" height="20px" src="../public/image/icon/arrow.png" alt=""> Quay lại </a>
<div>
<p title="Lưu" class="btn rounded-0 m-0 p-0">
    <img width="20px" height="20px" src="../public/image/icon/diskette.png" alt=""></p>
</div>


</div>
            </div>
            <div class="card-body">

                <form action="?option=topic&cat=process" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="input1">Tên chủ đề</label>
                                <input id="input1" type="text" name="name" class="form-control" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="input2">Từ khóa</label>
                                <textarea name="metakey" class="form-control" placeholder="Từ khóa" id="input2" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="input3">Mô tả</label>
                                <textarea id="area" name="metadesc" class="form-control" placeholder="Mô tả"  rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="input4">Cấp cha</label>
                                <select id="input4" name="parent_id" class="form-control" id="exampleFormControlSelect1">
                                    <?= $html_parent_id ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="input5">sắp xếp</label>
                                <select id="input5" name="sort_order" class="form-control" id="exampleFormControlSelect1">
                                    <?= $html_sort_order ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="file">Hình đại diện</label>
                                <input name="img" type="file" class="form-control-file" id="file">
                            </div>

                            <div class="form-group">
                                <label for="input6">Trạng thái</label>
                                <select id="input6" name="status" class="form-control" id="exampleFormControlSelect1">
                                    <option value="1">Hiện</option>
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