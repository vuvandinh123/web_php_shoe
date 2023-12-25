<?php 

use App\Models\Slider;
use App\Libraries\MyClass;
use App\Libraries\Upload;
$id = $_REQUEST['id'];
$list_slider = Slider::where([['status', '!=', '0'], ['id', '!=', $id]])->get();
$slider = Slider::find($id);
if($slider == null)
{
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'slider không tồn tại']);
     header("location:index.php?option=slider");
}
$html_position = '';
$html_sort_order = '';
foreach ($list_slider as $value) {
    $html_sort_order .= "<option value='" . $value->sort_order . "'> " . $value->name . "</option>";
}
?>
<?php 

?>

<?php require_once("../views/backend/header.php") ?>
<form action="?option=slider&cat=process&id=<?=$id?>" method="post" enctype="multipart/form-data">
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sửa slider</li>
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


                    <a title="Quay lại" class="btn bg-primary rounded-0" href="?option=slider&sort=desc&page=1">
                        <img width="20px" height="20px" src="../public/image/icon/arrow.png" alt=""> Quay lại</a>
                    <div>
                        <a title="sửa" href="?option=slider&cat=edit&id=<?=$id?>" class="btn bg-primary rounded-0 "><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a title="Thêm vào thùng rác" href="?option=slider&cat=delete&id=<?=$id?>"
                            class="btn bg-danger rounded-0"><i class="fa-solid fa-trash"></i></a>
                    </div>


                </div>
            </div>
            <div class="card-body">

            
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" value="<?=$id?>">
                            <div class="form-group">
                                <label for="input1">Tên slider</label>
                                <input id="input1" type="text" name="name" value="<?=$slider->name?>" class="form-control"
                                    placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="input2">Liên kết</label>
                                <input id="input2" value="<?=$slider->link?>" type="text" name="link" class="form-control"
                                    placeholder="Nhập link">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="input4">vị trí</label>
                                        <input id="input2 " readonly value="<?=$slider->position?>" type="text" name="position" class="form-control"
                                    placeholder="slider">
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
                        <input name="edit" class="btn bg-danger" type="submit" value="sửa">
                        
                    </div>

                
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
</form>
<?php require_once("../views/backend/footer.php") ?>