<?php

use App\Models\Contact;

$sort = $_REQUEST['sort'] ?? '';
$option = $_REQUEST['option'] ?? '';
$j = $_REQUEST['page'] ?? '';
?>


<?php
$all = Contact::where('status', '!=', 0)->count();
$pageNumber = $_REQUEST['page'] ?? 1;
$hienthi = 10;
$linkhienthi = ($pageNumber - 1) * $hienthi;
$number_of_page = ceil($all / $hienthi);
$key = '';
if (isset($_POST['search']) && !empty($_POST['search'])) {
    $key = $_POST['search'];
    $list_contact = Contact::where('status', 1)->where('name', 'like', "%" . $key . '%')->get();
} else {
    $list_contact = Contact::where('status', '!=', 0)
        ->skip($linkhienthi)
        ->take($hienthi)
        ->orderBy('created_at', 'desc')->get();
}
?>
<?php require_once("../views/backend/header.php") ?>
<form action="?option=contact&cat=process" method="post">
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liên hệ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Liên hệ</li>
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




                    </div>
                    <div><button class="btn bg-primary rounded-0 "><i class="fa-solid fa-plus"></i></button><button class="btn bg-danger rounded-0"><i class="fa-solid fa-trash"></i></button></div>
                </div>
                <div class="input-group mb-3">
                    <form action="" method="post" class="d-flex w-100">
                        <input type="text" class="form-control rounded-0" name="search" placeholder="Tìm sản phẩm..." aria-label="Recipient's username" aria-describedby="button-addon2" value="<?= $key ?>">
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
                                        <input type="checkbox" name="check_id[]" value="<?=$value->id?>">
                                    </td>
                                    <th scope="row"><?= $value->id ?></th>
                                    <td>
                                        <?= $value->name ?>
                                    </td>
                                    <td class=""><?= $value->email ?></td>

                                    <td>
                                        <?= $value->phone ?>
                                    </td>

                                    <td class=''>

                                        <?= date_format($value->created_at, "H:i:s d/m/Y ") ?></td>
                                    <td>
                                        <?php if($value->status==1): ?>
                                            <p class="bg-danger rounded text-center">Liên hệ mới</p>
                                            <?php else: ?>
                                                <p class="bg-primary rounded text-center">Đã trả lời</p>
                                       <?php endif; ?>
                                    </td>
                                    <td class="text-right d-flex">
                                        
                                        <a title="Trả lời" class="mx-2 btn btn-warning" href="index.php?option=contact&cat=replay&id=<?= $value->id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a title="xem" class="mr-2 btn btn-primary" href="index.php?option=contact&cat=show&id=<?= $value->id ?>"><i class="fa-solid fa-eye"></i></a>
                                        <a id="liveToastBtn" title="Xóa vào thùng rác" class="btn btn-danger mr-2" href="index.php?option=contact&cat=delete&sort=<?= $sort ?>&page=<?= $j ?>&id=<?= $value->id ?>"><i class="fa-solid fa-trash"></i></a>
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
                    <div><button type="submit" name="deletes" class="btn bg-danger rounded-0 ">Xóa</button></div>
                    <div>
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item">
                                    <span class="page-link"><a href="?option=contact&sort=<?= $sort ?>&page=1">Đầu</a></span>
                                </li>
                                <?php for ($i = 1; $i <= $number_of_page; $i++) : ?>
                                    <li class="page-item"> <a class=' page-link <?php if ($j == $i) echo 'bg-primary' ?>' href='?option=contact&sort=<?= $sort ?>&page=<?= $i ?>'><?= $i ?></a></li>
                                <?php endfor; ?>
                                <li class="page-item">
                                    <a class="page-link" href="?option=contact&sort=<?= $sort ?>&page=<?= --$i ?>">Cuối</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div><a class="btn bg-primary rounded-0 " href="index.php?option=contact&cat=recycle">Thêm</a>
                        <a class="btn bg-danger rounded-0 " href="index.php?option=contact&cat=recycle&page=1">Thùng
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
</form>
<?php require_once("../views/backend/footer.php") ?>