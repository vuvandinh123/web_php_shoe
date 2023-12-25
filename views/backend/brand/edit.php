<?php 

use App\Models\Brand;
use App\Libraries\MyClass;
use App\Libraries\Upload;
$id = $_REQUEST['id'];
$list_brand = Brand::where([['status', '!=', '0'], ['id', '!=', $id]])->get();
$brand = Brand::find($id);
if($brand == null)
{
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Thương hiệu không tồn tại']);
     header("location:index.php?option=brand&sort=desc&page=1");
}

$html_sort_order = '';
foreach ($list_brand as $value) {
   
            if($brand->sort_order-1 ==$value->sort_order)
            {
                $html_sort_order .= "<option selected value='" . $value->sort_order . "'>Sau: " . $value->name . "</option>";
            } else{
                $html_sort_order .= "<option value='" . $value->sort_order . "'>Sau: " . $value->name . "</option>";
            }
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
                    <h1>Sửa thương hiệu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="?option=brand&sort=desc&page=1">Thương hiệu</a></li>
                        <li class="breadcrumb-item active">Sửa Thương hiệu</li>
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


                    <a title="Quay lại" class="btn bg-primary rounded-0" href="?option=brand&sort=desc&page=1">
                        <img width="20px" height="20px" src="../public/image/icon/arrow.png" alt=""> Quay lại</a>
                    <div>
                        <a title="sửa" href="?option=brand&cat=edit&id=<?=$id?>" class="btn bg-primary rounded-0 "><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a title="Thêm vào thùng rác" href="?option=brand&cat=delete&id=<?=$id?>"
                            class="btn bg-danger rounded-0"><i class="fa-solid fa-trash"></i></a>
                    </div>


                </div>
            </div>
            <div class="card-body">

                <form action="?option=brand&cat=process" method="post" enctype="multipart/form-data">
                    <input name='id' id='id' type="hidden" value="<?=$id?>">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="input1">Tên Thương hiệu</label>
                                <input id="input1" value="<?=$brand->name?>" type="text" name="name" class="form-control" placeholder="Nhập tên Thương hiệu">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input id="slug" value="<?=$brand->slug?>" type="text" name="slug" class="form-control" placeholder="Nhập slug thương hiệu">
                            </div>

                            <div class="form-group">
                                <label for="input2">Từ khóa</label>
                                <textarea name="metakey"value="<?=$brand->metakey?>" class="form-control" placeholder="Từ khóa" id="input2" rows="3"><?=$brand->metakey?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="input3">Mô tả</label>
                                <textarea id="area" name="metadesc" class="form-control" placeholder="Mô tả" rows="3"><?=$brand->metadesc?></textarea>
                            </div>
                        </div>
                        <div class="col-3">
                        <div class="form-group">
                            <label for="input5">sắp xếp</label>
                            <select id="input5" name="sort_order"value="<?=$brand->sort_order?>" class="form-control" id="exampleFormControlSelect1">
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
                    <input class="btn bg-info px-4 ms-5" type="reset" value="Hủy">
                    <input name="edit" class="btn bg-danger" type="submit" value="Sửa">
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