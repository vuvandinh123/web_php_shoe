<?php 

use App\Models\Banner;
use App\Libraries\MyClass;
use App\Libraries\Upload;
$id = $_REQUEST['id'];
$list_banner = Banner::where([['status', '!=', '0'], ['id', '!=', $id]])->get();
$banner = Banner::find($id);
// print_r($list_banner);
if($banner == null)
{
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'banner không tồn tại']);
     header("location:index.php?option=banner");
}
$html_position = '';
$html_sort_order = '';
foreach ($list_banner as $value) {
    $html_sort_order .= "<option value='" . $value->sort_order+1 . "'> " .'Sau: '. $value->title . "</option>";
}
?>
<?php 

?>

<?php require_once("../views/backend/header.php") ?>
<form action="?option=banner&cat=process&id=<?=$id?>" method="post" enctype="multipart/form-data">
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sửa banner</li>
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


                    <a title="Quay lại" class="btn bg-primary rounded-0" href="?option=banner&sort=desc&page=1">
                        <img width="20px" height="20px" src="../public/image/icon/arrow.png" alt=""> Quay lại</a>
                    <div>
                        <a title="sửa" href="?option=banner&cat=edit&id=<?=$id?>" class="btn bg-primary rounded-0 "><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a title="Thêm vào thùng rác" href="?option=banner&cat=delete&id=<?=$id?>"
                            class="btn bg-danger rounded-0"><i class="fa-solid fa-trash"></i></a>
                    </div>


                </div>
            </div>
            <div class="card-body">

            
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" value="<?=$id?>">
                            <div class="form-group">
                                <label for="input1">Tên banner</label>
                                <input id="input1" type="text" name="title" value="<?=$banner->title?>" class="form-control"
                                    placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="input2">Liên kết</label>
                                <input id="input2" value="<?=$banner->link?>" type="text" name="link" class="form-control"
                                    placeholder="Nhập link">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="input4">vị trí</label>
                                        <input id="input2 " readonly value="<?=$banner->position?>" type="text" name="position" class="form-control"
                                    placeholder="banner">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="input5">sắp xếp</label>
                                        <select id="input5" name="sort_order" class="form-control"
                                            id="exampleFormControlSelect1">
                                            <option value="0">Đầu tiên</option>
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