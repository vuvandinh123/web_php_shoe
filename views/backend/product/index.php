<?php
use App\Models\Product;

$sort = $_REQUEST['sort']??'';
$option = $_REQUEST['option'] ?? '';
$j = $_REQUEST['page']??'';
$hienthi = $_REQUEST['hienthi'] ?? 5;
 ?>


<?php
                $all=Product::where([['status', 1],['category_id','!=',32]])->count();
                $pageNumber = $_REQUEST['page'] ?? 1 ;
                $linkhienthi = ($pageNumber - 1) * $hienthi;
                $number_of_page=ceil($all/$hienthi);
                $key = '';
                if(isset($_POST['search']) && !empty($_POST['search']))
                {
                    $key = $_POST['search'];
                    $list_product = Product::where([['status', 1],['category_id','!=',32]])->where('name','like',"%".$key.'%')->get();
} else {
    if ($sort == 'desc') {
        $list_product = Product::where([['status', '!=', 0],['category_id','!=',32]])
            ->skip($linkhienthi)
            ->take($hienthi)
            ->orderBy('created_at', 'desc')->get();
    } elseif ($sort == 'asc') {
        $list_product = Product::where([['status', '!=', 0],['category_id','!=',32]])
            ->skip($linkhienthi)
            ->take($hienthi)
            ->orderBy('created_at', 'asc')->get();

    } elseif ($sort == 'priceAsc') {
        $list_product = Product::where([['status', '!=', 0],['category_id','!=',32]])
            ->skip($linkhienthi)
            ->take($hienthi)
            ->orderBy('price', 'asc')->get();
    } elseif ($sort == 'priceDesc') {
        $list_product = Product::where([['status', '!=', 0],['category_id','!=',32]])
            ->skip($linkhienthi)
            ->take($hienthi)
            ->orderBy('price', 'desc')->get();
    }
    else{
        $list_product = Product::where([['status', '!=', 0],['category_id','!=',32]])
            ->skip($linkhienthi)
            ->take($hienthi)
            ->orderBy('created_at', 'desc')->get();
    }
}
                ?>
<?php require_once("../views/backend/header.php") ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Tất cả sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Tất cả sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between mb-3">
                    <div class="d-flex">
                        <label for="">Sắp xếp: </label>
                        <div class="form-check mx-3">
                            <?php
                            $kieu = 'desc';
                            $value = 'Hàng mới nhất';
                            include('../app/sort.php') ?>
                        </div>
                        <div class="form-check mx-3">

                            <?php
                                $kieu = 'asc';
                                $value = 'Hàng cũ nhất';
                                include('../app/sort.php') ?>

                        </div>
                        <div class="form-check mx-3">

                            <?php
                                $kieu = 'priceAsc';
                                $value = 'Giá tăng dần';
                                include('../app/sort.php') ?>
                        </div>
                        <div class="form-check mx-3">
                            <?php
                                $kieu = 'priceDesc';
                                $value = 'Giá giảm dần';
                                include('../app/sort.php') ?>

                        </div>
                        <style>
                            #dropdow_item{
                               
                                background-color: #333;
                                position: absolute;
                               z-index: 99;
                               left: 0;
                               right: 0;
                                display: none;
                            }
                        </style>
                        <script>
                            var t=1;
                            
                            function click1()
                            {
                                t++;
                                if(t%2==0)
                                document.getElementById('dropdow_item').style.display='block';
                                else
                                {
                                    document.getElementById('dropdow_item').style.display='none';
                                }
                               
                                
                            }
                        </script>
                        <div class="form-check mx-3 position-relative">
                            <div class="drop">
                                <button class="btn bg-info px-5" type="button" onclick="click1()">Hiển thị</button>
                            </div>
                            <div id="dropdow_item">
                                <a class="d-block text-center" href="?option=product&sort=desc&page=1&hienthi=5">5</a>
                                <a class="d-block " href="?option=product&sort=desc&page=1&hienthi=10">10</a>
                                <a class="d-block " href="?option=product&sort=desc&page=1&hienthi=15">15</a>

                            </div>

                        </div>

                    </div>
                    <div><a href="?option=product&cat=create" class="btn bg-primary rounded-0 "><i class="fa-solid fa-plus"></i></a><button
                            class="btn bg-danger rounded-0"><i class="fa-solid fa-trash"></i></button></div>
                </div>
                <div class="input-group mb-3">
                    <form action="" method="post" class="d-flex w-100">
                        <input type="text" class="form-control rounded-0" name="search" placeholder="Tìm sản phẩm..."
                            aria-label="Recipient's username" aria-describedby="button-addon2" value="<?=$key ?>">
                        <input class="btn btn-outline-danger rounded-0 px-5" type="submit" value="Tìm kiếm">
                    </form>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover ">
                        <thead>
                            <tr class="bg-primary">

                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Hình</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Thương hiệu</th>
                                <th scope="col">Giá</th>

                                <th scope="col">Ngày tạo</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_product as $value): ?>
                            <tr>

                                <td class="">
                                    <input type="checkbox">
                                </td>
                                <th scope="row"><?=$value['id']?></th>
                                <td>
                                    <img width="50px" height="50px" src="../public/image/product/<?=$value['image']?>"
                                        alt="<?=$value['name']?>">
                                </td>
                                <td class=""><?=$value['name']?></td>

                                <td>
                                    <?php  if($value['brand_id']==1):  ?>
                                    NIKE
                                    <?php else: ?>
                                    ADIDAS
                                    <?php endif; ?>
                                </td>
                                <td><?php echo number_format($value['price'])?></td>
                                <td class=''>

                                    <?=date_format($value['created_at'],"H:i:s d/m/Y ") ?></td>
                                <td class="text-right">
                                    <?php if($value->status=='1'):?>
                                    <a title="Tắt" class="btn btn-primary"
                                        href="index.php?option=product&cat=status&sort=<?=$sort?>&page=<?=$j?>&id=<?=$value->id?>">
                                        <i class="fa-solid fa-toggle-on"></i></a>
                                    <?php else:?>
                                    <a title="Bật" class="btn btn-danger"
                                        href="index.php?option=product&cat=status&sort=<?=$sort?>&page=<?=$j?>&id=<?=$value->id?>"><i
                                            class="fa-solid fa-toggle-off "></i></a>
                                    <?php endif;?>
                                    <a title="sửa" class="mx-2 btn btn-warning"
                                        href="index.php?option=product&cat=edit&id=<?=$value->id?>"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a title="xem" class="mr-2 btn btn-primary"
                                        href="index.php?option=product&cat=show&id=<?=$value->id?>"><i
                                            class="fa-solid fa-eye"></i></a>
                                            <a title="thêm ảnh" class="mr-2 btn btn-info"
                                        href="index.php?option=product&cat=addimage&id=<?=$value->id?>"><i class="fa-solid fa-images"></i></a>
                                    <a id="liveToastBtn" title="Xóa vào thùng rác" class="btn btn-danger mr-2"
                                        href="index.php?option=product&cat=delete&sort=<?=$sort?>&page=<?=$j?>&id=<?=$value->id?>"><i
                                            class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <div class="d-flex justify-content-between mb-3">
                    <div><button class="btn bg-danger rounded-0 ">Xóa</button></div>
                    <div>
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item">
                                    <span class="page-link"><a
                                            href="?option=product&sort=<?=$sort ?>&page=1">Đầu</a></span>
                                </li>
                                <?php for($i=1;$i<=$number_of_page;$i++): ?>
                                <li class="page-item"> <a class=' page-link <?php if($j==$i)echo 'bg-primary' ?>'
                                        href='?option=product&sort=<?=$sort?>&page=<?=$i?>'><?=$i?></a></li>
                                <?php endfor; ?>
                                <li class="page-item">
                                    <a class="page-link" href="?option=product&sort=<?=$sort ?>&page=<?=--$i?>">Cuối</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div><a class="btn bg-primary rounded-0 " href="index.php?option=product&cat=recycle">Thêm</a>
                        <a class="btn bg-danger rounded-0 " href="index.php?option=product&cat=recycle&page=1">Thùng
                            rác</a>
                    </div>

                </div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once("../views/backend/footer.php") ?>