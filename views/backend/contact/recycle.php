<?php

use App\Models\Contact;

$sort = $_REQUEST['sort'] ?? '';
$option = $_REQUEST['option'] ?? '';
 $j=$_REQUEST['page']??'';


$all = Contact::where('status', '==', 0)->count();
$pageNumber = $_REQUEST['page'] ?? 1;
$hienthi = 4;
$linkhienthi = ($pageNumber - 1) * $hienthi;
$number_of_page = ceil($all / $hienthi);
$key = '';
if (isset($_POST['search']) && !empty($_POST['search'])) {
    $key = $_POST['search'];
    $list_contact = Contact::where('status', 1)->where('name', 'like', "%" . $key . '%')->get();
} else {
    $list_contact = Contact::where('status', '==', 0)
        ->skip($linkhienthi)
        ->take($hienthi)
        ->orderBy('created_at', 'desc')->get();
}

       
?>

<?php require_once("../views/backend/header.php") ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thùng rác liên hệ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="index.php?option=contact&sort=desc&page=1">Liên hệ</a></li>
                        <li class="breadcrumb-item active">Thùng rác liên hệ</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end mb-3">
                    
                    <div>
                        <a class="btn bg-primary rounded-0" href="?option=contact&sort=desc&page=1">
                            <img width="20px" height="20px" src="../public/image/icon/arrow.png" alt=""> Quay lại</a>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <form action="" method="post" class="d-flex w-100">
                        <input type="text" class="form-control rounded-0" name="search" placeholder="Tìm sản phẩm..."
                            aria-label="Recipient's username" aria-describedby="button-addon2" value="<?= $key ?>">
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
                                <th scope="col">Họ Và Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Điện thoại</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($list_contact as $value) : ?>
                            <tr>

                            <td class="">
                                        <input type="checkbox" value="<?=$value->id?>" name="check_id[]">
                                    </td>
                                    <th scope="row"><?= $value['id'] ?></th>
                                    <td>
                                        <?= $value['name'] ?>
                                    </td>
                                    <td class=""><?= $value->email ?></td>

                                    <td>
                                        <?= $value->phone ?>
                                    </td>

                                    <td class=''>

                                        <?= date_format($value->created_at, "H:i:s d/m/Y ") ?></td>
                                    <td>
                                        <?= $value->status ?>
                                    </td>
                                <td class="text-right d-flex">

                                    <a title="Khôi phục" class="mx-2 btn btn-primary"
                                        href="index.php?option=contact&cat=restore&page=<?=$j?>&id=<?= $value->id ?>"><i
                                            class="fa-solid fa-rotate-right"></i></a>
                                    <a title="Xóa" class="mr-2 btn btn-danger"
                                        href="index.php?option=contact&cat=destroy&page=<?=$j?>&id=<?= $value->id ?>"><i
                                            class="fa-solid fa-xmark"></i></a>
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
                    <div><button type="submit" name="destroys" class="btn bg-danger rounded-0 ">Xóa</button></div>
                    <div>
                        <nav aria-label="...">
                        <ul class="pagination">
                                <li class="page-item">
                                    <span class="page-link"><a href="?option=contact&cat=recycle&page=1">Đầu</a></span>
                                </li>
                                <?php for($i=1;$i<=$number_of_page;$i++): ?>
                                <li class="page-item"> <a class=' page-link <?php if($j==$i)echo 'bg-primary' ?>'
                                        href='?option=contact&cat=recycle&page=<?=$i?>'><?=$i?></a></li>
                                <?php endfor; ?>
                                <li class="page-item">
                                    <a class="page-link" href="?option=contact&cat=recycle&page=<?=--$i?>">Cuối</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div></div>
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
<?php require_once("../views/backend/footer.php") ?>