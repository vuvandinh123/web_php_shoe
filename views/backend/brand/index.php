<?php
use App\Models\Brand;
use App\Libraries\MyClass;

$sort = $_REQUEST['sort']??'';
$option = $_REQUEST['option'] ?? '';
$j=$_REQUEST['page']??'';

                $all=Brand::where('status', '!=','0')->count();
                $pageNumber = $_REQUEST['page'] ?? 1 ;
                $hienthi = 3;
                $linkhienthi = ($pageNumber - 1) * $hienthi;
                $number_of_page=ceil($all/$hienthi);
                $key = '';
                $list_brand = '';
                if(isset($_POST['search']) && !empty($_POST['search']))
                {
                    $key = $_POST['search'];
                    $list_brand = Brand::where('status', '!=',0)->where('name','like',"%".$key.'%')->get();
} else {
    if ($sort == 'desc') {
        $list_brand = Brand::where('status', '!=', 0)
            ->skip($linkhienthi)
            ->take($hienthi)
            ->orderBy('created_at', 'desc')->get();
    } elseif ($sort == 'asc') {
        $list_brand = Brand::where('status', '!=', 0)
            ->skip($linkhienthi)
            ->take($hienthi)
            ->orderBy('created_at', 'asc')->get();

    } 
    else{
        $list_brand = Brand::where('status', '!=', 0)
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
                    <h1>Thương hiệu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thương hiệu</li>
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
                            $value = 'Mới nhất';
                            include('../app/sort.php') ?>
                            </div>
                            <div class="form-check mx-3">
                            <?php
                            $kieu = 'asc';
                            $value = 'Cũ nhất';
                            include('../app/sort.php') ?>
                            </div>
                    </div>
                    <div><a href="?option=brand&cat=create" class="btn bg-primary rounded-0 "><i class="fa-solid fa-plus"></i></a><button
                            class="btn bg-danger rounded-0"><i class="fa-solid fa-trash"></i></button></div>
                </div>
                <div class="input-group mb-3">
                    <form action="" method="post" class="d-flex w-100">
                        <input type="text" class="form-control rounded-0" name="search" placeholder="Tìm thương hiệu..."
                            aria-label="Recipient's username" aria-describedby="button-addon2" value="<?=$key ?>">
                        <input class="btn btn-outline-danger rounded-0 px-5" type="submit" value="Tìm kiếm">
                    </form>
                </div>
            </div>
            <div class="card-body">
            <form action="?option=brand&cat=process" method="post" enctype="multipart/form-data">
                <div class="table-responsive">

                    <table class="table table-hover ">
                        <thead>
                            <tr class="bg-primary">

                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Hình</th>
                                <th scope="col">Tên thương hiệu</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_brand as $value): ?>
                            <tr>

                                <td class="">
                              
                                    <input value="<?=$value->id?>" type="checkbox" name="check_id[]">
                                
                                </td>
                                <th scope="row"><?=$value['id']?></th>
                                <td>
                                    <img width="50px" height="50px" src="../public/image/brand/<?=$value['image']?>"
                                        alt="<?=$value['name']?>">
                                </td>
                                <td class=""><?=$value['name']?></td>

                                <td>
                                    <?=  $value['slug']  ?>

                                </td>

                                <td class=''>

                                    <?=date_format($value['created_at'],"d/m/Y H:i:s") ?></td>
                                    <td class="text-right">
                                    <?php if($value->status=='1'):?>
                                    <a title="Tắt" class="btn btn-primary" href="index.php?option=brand&cat=status&sort=<?=$sort?>&page=<?=$j?>&id=<?=$value->id?>">
                                    <i class="fa-solid fa-toggle-on"></i></a>
                                    <?php else:?>
                                    <a title="Bật" class="btn btn-danger"  href="index.php?option=brand&cat=status&sort=<?=$sort?>&page=<?=$j?>&id=<?=$value->id?>"><i class="fa-solid fa-toggle-off "></i></a>
                                    <?php endif;?>
                                    <a title="sửa" class="mx-2 btn btn-warning"
                                        href="index.php?option=brand&cat=edit&id=<?=$value->id?>"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a title="xem" class="mr-2 btn btn-primary"
                                        href="index.php?option=brand&cat=show&id=<?=$value->id?>"><i
                                            class="fa-solid fa-eye"></i></a>
                                    <a title="Xóa vào thùng rác" class="btn btn-danger mr-2"
                                        href="index.php?option=brand&cat=delete&id=<?=$value->id?>"><i
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
                <div>
                <button type="submit" name="deletes" class="btn bg-danger rounded-0 ">Xóa</button>
            </div>
                    <div>
                        <nav aria-label="...">
                        <ul class="pagination">
                                <li class="page-item">
                                    <span class="page-link"><a href="?option=brand&sort=<?=$sort?>&page=1">Đầu</a></span>
                                </li>
                                <?php for($i=1;$i<=$number_of_page;$i++): ?>
                                <li class="page-item"> <a class=' page-link <?php if($j==$i)echo 'bg-primary' ?>'
                                        href='?option=brand&sort=<?=$sort?>&page=<?=$i?>'><?=$i?></a></li>
                                <?php endfor; ?>
                                <li class="page-item">
                                    <a class="page-link" href="?option=brand&sort=<?=$sort?>&page=<?=--$i?>">Cuối</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div><a class="btn bg-primary rounded-0 " href="index.php?option=brand&cat=recycle&page=1">Thêm</a>
                    <a class="btn bg-danger rounded-0 " href="index.php?option=brand&cat=recycle&page=1">Thùng rác</a>
                </div>
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