<?php 

use App\Models\Topic;
use App\Libraries\MyClass;
use App\Libraries\Upload;
$id = $_REQUEST['id'];
$list_topic = Topic::where([['status', '!=', '0'], ['id', '!=', $id]])->get();
$topic = Topic::find($id);
if($topic == null)
{
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Danh mục không tồn tại']);
     header("location:index.php?option=topic");
}

$html_parent_id = '';
$html_sort_order = '';
foreach ($list_topic as $value) {
    if($value->id!=$id)
    {
            if ($topic->parent_id == $value->id)
            {
                $html_parent_id .= "<option selected value='" . $value->id . "'>" . $value->name . "</option>";
            }
            else{
                $html_parent_id .= "<option value='" . $value->id . "'>" . $value->name . "</option>";
            }
            if($topic->sort_order-1 ==$value->sort_order)
            {
                $html_sort_order .= "<option selected value='" . $value->sort_order . "'>Sau: " . $value->name . "</option>";
            } else{
                $html_sort_order .= "<option value='" . $value->sort_order . "'>Sau: " . $value->name . "</option>";
            }
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
                    <h1>Sửa danh mục</h1>
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


                    <a title="Quay lại" class="btn bg-primary rounded-0" href="?option=topic&sort=desc&page=1">
                        <img width="20px" height="20px" src="../public/image/icon/arrow.png" alt=""> Quay lại</a>
                    <div>
                        <a title="sửa" href="?option=topic&cat=edit&id=<?=$id?>" class="btn bg-primary rounded-0 "><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a title="Thêm vào thùng rác" href="?option=topic&cat=delete&id=<?=$id?>"
                            class="btn bg-danger rounded-0"><i class="fa-solid fa-trash"></i></a>
                    </div>


                </div>
            </div>
            <div class="card-body">

                <form action="?option=topic&cat=process" method="post" enctype="multipart/form-data">
                    <input name='id' id='id' type="number" value="<?=$id?>">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="input1">Tên danh mục</label>
                                <input id="input1" value="<?=$topic->name?>" type="text" name="name"
                                    class="form-control" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="input2">Từ khóa</label>
                                <textarea name="metakey" value="" class="form-control" placeholder="Từ khóa" id="input2"
                                    rows="3"><?=$topic->metakey?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="area">Mô tả</label>
                                <textarea id="area" name="metadesc" value="" class="form-control" placeholder="Mô tả"
                                    rows="3"><?=$topic->metadesc?></textarea>
                            </div>

                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="input4">Cấp cha</label>
                                <select id="input4" name="parent_id" class="form-control"
                                    id="exampleFormControlSelect1">
                                    <?= $html_parent_id ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="input5">sắp xếp</label>
                                <select id="input5" name="sort_order" class="form-control"
                                    id="exampleFormControlSelect1">
                                    <?= $html_sort_order ?>
                                </select>
                            </div>

                           

                            <div class="form-group">
                                <label for="input6">Trạng thái</label>
                                <select id="input6" name="status" value="<?=$topic->status?>" class="form-control"
                                    id="exampleFormControlSelect1">
                                    <option value="1">Hiện</option>
                                    <option value="2">Ẩn</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <input name="edit" class="btn bg-danger" type="submit" value="Thêm">
                        
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