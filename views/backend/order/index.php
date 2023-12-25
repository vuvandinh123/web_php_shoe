<?php
use App\Models\Order;
?>
<?php
$j = $_REQUEST['page'] ?? '';
               $sort = $_REQUEST['sort']??'';
$option = $_REQUEST['option'] ?? '';

               $all=Order::where('status', '!=',0)->count();
                $pageNumber = $_REQUEST['page'] ?? 1 ;
                $hienthi = 4;
                $linkhienthi = ($pageNumber - 1) * $hienthi;
                $number_of_page=ceil($all/$hienthi);
                $key = '';
                if(isset($_POST['search']) && !empty($_POST['search']))
                {
                    $key = $_POST['search'];
                    $list_order = Order::where('status', 1)->where('deliveryname','like',"%".$key.'%')->get();
                } 
                else {
                    if ($sort == 'desc') {
                        $list_order = Order::where('status', '!=', 0)
                            ->skip($linkhienthi)
                            ->take($hienthi)
                            ->orderBy('created_at', 'desc')->get();
                    } elseif ($sort == 'asc') {
                        $list_order = Order::where('status', '!=', 0)
                            ->skip($linkhienthi)
                            ->take($hienthi)
                            ->orderBy('created_at', 'asc')->get();
                
                    } 
                    else{
                        $list_order = Order::where('status', '!=', 0)
                            ->skip($linkhienthi)
                            ->take($hienthi)
                            ->orderBy('created_at', 'desc')->get();
                    }}
                ?>
<?php require_once("../views/backend/header.php") ?>
<form action="?option=slider&cat=process" method="post" enctype="multipart/form-data">
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đơn hàng</li>
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
                            $value = 'Mới';
                            include('../app/sort.php') ?>
                            </div>
                            <div class="form-check mx-3">
                            <?php
                            $kieu = 'asc';
                            $value = 'Cũ';
                            include('../app/sort.php') ?>
                            </div>
                    </div>
                    <div><a
                     href="?option=order&cat=recycle&sort=desc&page=1"       class="btn bg-danger rounded-0"><i class="fa-solid fa-trash"></i></a></div>
                </div>
                <div class="input-group mb-3">
                    <form action="" method="post" class="d-flex w-100">
                        <input type="text" class="form-control rounded-0" name="search" placeholder="Tìm kiếm..."
                            aria-label="Recipient's username" aria-describedby="button-addon2" value="<?=$key ?>">
                        <input class="btn btn-outline-danger rounded-0 px-5" type="submit" value="Tìm kiếm">
                    </form>
                </div>
            </div>
            <div class="card-body">
            <form action="?option=order&cat=process" method="post">
                <div class="table-responsive">

                    <table class="table table-hover ">
                        <thead>
                            <tr class="bg-primary">

                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col"> </th>
                                <th scope="col">Khách hàng</th>
                                <th scope="col">Email</th>
                                <th scope="col">Điện thoại</th>
                               
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_order as $value): ?>
                            <tr class="">

                                <td class="">
                                    <input name="check_id[]" value="<?=$value->id?>" type="checkbox">
                                </td>
                                <th scope="row"><?=$value['id']?></th>
                                <td>
                                    <img width="30px" height="30px" src="../public/image/icon/order.png"
                                        alt="<?=$value['deliveryname']?>">
                                </td>
                                <td class=""><?=$value['deliveryname']?></td>


                                <td><?=$value['deliveryemail']?></td>
                                <td><?=$value['deliveryphone']?></td>
                               
                                <td class=''>

                                    <?=date_format($value['created_at'],"H:i:s d/m/Y ") ?></td>
                                <td class=''>
                                    <?php if($value['status']==1): ?>
                                    <span class="bg-warning p-1 rounded ">Đang vận chuyển</span>
                                    <?php else: ?>
                                    <span class=" bg-danger p-1 rounded">Đơn hàng mới</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-right d-flex">
                                    <?php if($value->status=='1'):?>
                                    <a title="Tắt" class="btn btn-primary"
                                        href="index.php?option=order&cat=status&sort=<?=$sort?>&page=<?=$j?>&id=<?=$value->id?>">
                                        <i class="fa-solid fa-toggle-on"></i></a>
                                    <?php else:?>
                                    <a title="Bật" class="btn btn-danger"
                                        href="index.php?option=order&cat=status&sort=<?=$sort?>&page=<?=$j?>&id=<?=$value->id?>"><i
                                            class="fa-solid fa-toggle-off "></i></a>
                                    <?php endif;?>
                                    
                                    <a title="xem" class=" btn btn-info"
                                        href="index.php?option=order&cat=show&sort=<?=$sort?>&page=<?=$j?>&id=<?=$value->id?>"><i
                                            class="fa-solid fa-eye"></i></a>
                                    <a title="Xóa vào thùng rác" class="btn btn-danger mr-2"
                                        href="index.php?option=order&cat=delete&sort=<?=$sort?>&page=<?=$j?>&id=<?=$value->id?>"><i
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
                    
                    <div><button name="deletes" type="submit" class="btn bg-danger rounded-0 ">Xóa</button></div></form>
                    <div>
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item">
                                    <span class="page-link"><a
                                            href="?option=order&sort=<?=$sort?>&page=1">Đầu</a></span>
                                </li>
                                <?php for($i=1;$i<=$number_of_page;$i++): ?>
                                <li class="page-item"> <a class=' page-link <?php if($j==$i)echo 'bg-primary' ?>'
                                        href='?option=order&sort=<?=$sort?>&page=<?=$i?>'><?=$i?></a></li>
                                <?php endfor; ?>
                                <li class="page-item">
                                    <a class="page-link" href="?option=order&sort=<?=$sort?>&page=<?=--$i?>">Cuối</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div>
                        <a class="btn bg-danger rounded-0 " href="index.php?option=order&cat=recycle&page=1">Thùng
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
</div>
</form>
<?php require_once("../views/backend/footer.php") ?>