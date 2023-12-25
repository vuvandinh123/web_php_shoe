<?php

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;

$id = $_REQUEST['id'];
$product = Category::where([['status', '!=', '0'], ['id', '=', $id]])->first();
$product = Product::find($id);
$num=Image::where('id_product',$id)->count();
$image=Image::where('id_product',$id)->get();
?>
<?php

?>

<?php require_once("../views/backend/header.php") ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="font-weight-bold text-danger">Thêm hình ảnh</h1>
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
            <style>
            .aa {
                position: relative;
            }

            #ou {
                flex-wrap: wrap;
            }

            .ou {
                position: absolute;
                opacity: 0;
            }

            input:checked+label>img {
                border: 2px solid red;
                padding: 5px;
            }

            #them {
                opacity: 0;
            }
            </style>
            <div class="card-body">
            <form action="?option=accessory&cat=process&id=<?=$id?>" method="post" enctype="multipart/form-data">
                <?php $i = 1; foreach($image as $value):?>
                   <?php $i++;?>
                <input class="ou" type="checkbox" name="check_id[]" id='<?= $i ?>' value="<?=$value->id ?>">
                <label id="label<?= $i ?>" onclick="ham()" for="<?= $i ?>"> <img width="100px" height="100px"
                        src="../public/image/product/<?=$value->name?>" alt=""></label>

                <?php endforeach;?>
                
                    <div class="row">
                        <div class="col-9">

                            <input multiple="multiple" name="file[]" size="141" type="file" />




                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <input name="images" class="btn bg-danger" type="submit" value="Thêm">
                        <input type="submit" name="deleteimg" class="btn bg-info"  value="xóa">
                    </div>

              
            </div>
            </form>
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