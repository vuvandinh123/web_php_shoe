<?php 

use App\Models\Menu;
use App\Libraries\MyClass;
use App\Libraries\Upload;
$id = $_REQUEST['id'];

$menu = Menu::find($id);
if($menu == null)
{
    MyClass::set_flash('msesage',['type'=>'alert-success','msg'=>'Danh mục không tồn tại']);
     header("location:index.php?option=menu");
}
$args_menu = [
    ['position', $menu->position],
    ['level', '<', 3],
    ['status', '!=', 0],
    ['id', '!=', $id]
];

$list_menu = Menu::where($args_menu)->get();
$html_parent_id = '';

foreach ($list_menu as $value) {
    if($value->id==$menu->parent_id)
    {
        $html_parent_id .= "<option selected value='" . $value->id . "'>" . $value->name . "</option>";
    }
    else
    {
        $html_parent_id .= "<option value='" . $value->id . "'>" . $value->name . "</option>";
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
                    <h1>Sửa menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="index.php?option=menu">Menu</a></li>
                        <li class="breadcrumb-item active">Sửa menu</li>
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


                    <a title="Quay lại" class="btn bg-primary rounded-0" href="?option=menu&sort=desc&page=1">
                        <img width="20px" height="20px" src="../public/image/icon/arrow.png" alt=""> Quay lại</a>
                    <div>
                        <a title="sửa" href="?option=menu&cat=edit&id=<?=$id?>" class="btn bg-primary rounded-0 "><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a title="Thêm vào thùng rác" href="?option=menu&cat=delete&id=<?=$id?>"
                            class="btn bg-danger rounded-0"><i class="fa-solid fa-trash"></i></a>
                    </div>


                </div>
            </div>
            <div class="card-body">

                <form action="?option=menu&cat=process&id=<?=$id?>" method="post" enctype="multipart/form-data">
                    <input name='id' id='id' type="number" value="<?=$id?>">
                    <div class="row">
                        <div class="col-9 m-auto">
                            <?php if($menu->type!='page'): ?>
                            <div class="form-group">
                                <label for="input1">Tên menu</label>
                                <input readonly  id="input1" value="<?=$menu->name?>" type="text" name="name"
                                    class="form-control" placeholder="Nhập tên menu">
                            </div>
                            
                            <?php else :?>
                                <div class="form-group">
                                <label for="input1">Tên menu</label>
                                <input  id="input1" value="<?=$menu->name?>" type="text" name="name"
                                    class="form-control" placeholder="Nhập tên menu">
                            </div>
                            
                            <?php endif;?>
                            <div class="form-group">
                                <label for="input2">Link</label>
                                <input id="input2" value="<?=$menu->link?>" type="text" name="link"
                                    class="form-control" placeholder="Nhập link">
                            </div>
                            <div class="form-group">
                                <label for="input6">Menu cấp</label>
                                <select id="input6" name="level" value="<?=$menu->status?>" class="form-control"
                                    id="exampleFormControlSelect1">
                                    <option value="1">Cấp 1</option>
                                    <option value="2">Cấp 2</option>
                                    <option value="3">Cấp 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="input5">Vị trí</label>
                                <select name="position" id="inputState" class="form-control">
                                                <option value="mainmenu" selected>Main Menu</option>
                                                <option value="footermenu">footer Menu</option>
                                            </select>
                            </div>
                            <div class="form-group">
                                <label for="input3">Thứ tự</label>
                                <input id="input3" value="<?=$menu->sort_order?>" type="number" name="sort_order"
                                    class="form-control" placeholder="Nhập thứ tự">
                            </div>

                            <div class="form-group">
                                <label for="input4">Cấp cha</label>
                                <select id="input4" name="parent_id" class="form-control"
                                    id="exampleFormControlSelect1">
                                    <option value="0" selected >none</option>
                                    <?= $html_parent_id ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="input6">Trạng thái</label>
                                <select id="input6" name="status" value="<?=$menu->status?>" class="form-control"
                                    id="exampleFormControlSelect1">
                                    <option value="1">Hiện</option>
                                    <option value="2">Ẩn</option>
                                </select>
                            </div>
                        </div>
                       
                    </div>
                    <div class="d-flex justify-content-between">
                        <input name="edit" class="btn bg-danger" type="submit" value="Lưu">
                        
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