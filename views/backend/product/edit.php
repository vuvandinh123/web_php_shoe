<?php 

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$product = Category::where([['status', '!=', '0'], ['id', '=', $id]])->first();
$product = Product::find($id);
if($product == null)
{
    MyClass::set_flash('message',['type'=>'success','msg'=>'Danh mục không tồn tại']);
     //header("location:index.php?option=product&sort=desc&page=1");
}
$list_category = Category::where('status', '!=', 0)->get();
$list_brand = Brand::where('status', '!=', 0)->get();


$str_option_cat = '';
$str_option_brand = '';
foreach ($list_category as $value) {
    if($product->category_id==$value->id)
    {
        $str_option_cat .= "<option selected value='" . $value->id . "'>" . $value->name . "</option>";
    }
     else{
         $str_option_cat .= "<option value='" . $value->id . "'>" . $value->name . "</option>";}
 
}
foreach ($list_brand as $value) {
    if($product->brand_id==$value->id)
    {
        $str_option_brand .= "<option selected value='" . $value->id . "'>" . $value->name . "</option>";
    }
     else{
        $str_option_brand .= "<option value='" . $value->id . "'>" . $value->name . "</option>";}
 
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
                    <h1>Sửa sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sửa sản phẩm</li>
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
     <form action="?option=product&cat=process&id=<?=$id?>" method="post" enctype="multipart/form-data">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between mb-3">


                    <a title="Quay lại" class="btn bg-primary rounded-0" href="?option=product&sort=desc&page=1">
                        <img width="20px" height="20px" src="../public/image/icon/arrow.png" alt=""> Quay lại</a>
                    <div>
                        <a title="sửa" href="?option=product&cat=edit&id=<?=$id?>" class="btn bg-primary rounded-0 "><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a title="Thêm vào thùng rác" href="?option=product&cat=delete&id=<?=$id?>"
                            class="btn bg-danger rounded-0"><i class="fa-solid fa-trash"></i></a>
                    </div>


                </div>
            </div>
            <div class="card-body">

           
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="input1">Tên Sản Phẩm</label>
                                <input id="input1" value="<?=$product->name?>" type="text" name="name" class="form-control" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="input2">Chi tiết</label>
                                <textarea id="area" name="detail" class="form-control" placeholder="Từ khóa" id="input2" rows="6"><?=$product->detail?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="input2">Từ khóa</label>
                                <textarea name="metakey" class="form-control" placeholder="Từ khóa" id="input2" rows="3"><?=$product->metakey?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="input3">Mô tả</label>
                                <textarea name="metadesc" class="form-control" placeholder="Mô tả" id="input3" rows="3"><?=$product->metadesc?></textarea>
                            </div>

                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="input4">Danh mục</label>
                                <select id="input4" name="category_id" class="form-control" id="exampleFormControlSelect1">
                                    <?= $str_option_cat ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="input5">Thương hiệu</label>
                                <select id="input5" name="brand_id" class="form-control" id="exampleFormControlSelect1">
                                    <?= $str_option_brand ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="input6">Giá sản phẩm</label>
                                <input id="input6" value="<?=$product->price?>" type="text" name="price" class="form-control" placeholder="Nhập Gía">
                            </div>
                            <div class="form-group">
                                <label for="input7">Giá khuyến mại</label>
                                <input id="input7" value="<?=$product->pricesale?>" type="text" name="pricesale" class="form-control" placeholder="Nhập giá khuyến mại">
                            </div>
                            <div class="form-group">
                                <label for="input8">Số lượng</label>
                                <input id="input8"  type="number" min="1" value="<?=$product->qty?>" name="qty" class="form-control" placeholder="số luọng">
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
                    <input name="edit" class="btn bg-danger" type="submit" value="edit">
                    <input class="btn bg-info" type="reset" value="Hủy">
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