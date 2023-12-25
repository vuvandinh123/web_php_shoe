<?php
use App\Models\Order;
// $list_order = Order::where('status', '!=', '0')->orderBy('created_at', 'desc')->get();
?>

<?php
                $all=Order::where('status', '!=',0)->count();
                $pageNumber = $_REQUEST['page'] ?? 1 ;
                $hienthi = 4;
                $linkhienthi = ($pageNumber - 1) * $hienthi;
                $number_of_page=ceil($all/$hienthi);
                $key = '';
                if(isset($_POST['search']) && !empty($_POST['search']))
                {
                    $key = $_POST['search'];
                    $list_order = Order::where('status','!=', 0)->where('deliveryaddress','like',"%".$key.'%')->orwhere('deliveryemail','like',"%".$key.'%')
                   
                    ->orwhere('deliveryaddress','like',"%".$key.'%')
                    ->get();
                } 
                else {
                $list_order = Order::where('status', '=', 1)
                    ->skip($linkhienthi)
                    ->take($hienthi)
                    ->orderBy('created_at', 'desc')->get();}
                ?>
<?php require_once("../views/backend/header.php") ?>
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
                            <li class="breadcrumb-item active">Thành viên</li>
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
                            <a class="text-dark" href="?option=order"><i class="fa-regular fa-square mr-2 text-danger"></i>Mới nhất</a>
                            </div>
                            <div class="form-check mx-3">
                                <a class="text-dark" href="?option=order&cat=Old"><i class="fa-regular fa-square mr-2 text-danger"></i> Cũ nhất</a>
                            </div>
							<div class="form-check mx-3">
                                <a class="text-danger" href="?option=order&cat=Old"><i class="fa-solid fa-square-check text-danger mr-2"></i>Đang vận chuyển</a>
                            </div>
							<div class="form-check mx-3">
                                <a class="text-dark" href="?option=order&cat=newOrder"><i class="fa-regular fa-square mr-2 text-danger"></i>đơn hàng mới</a>
                            </div>
                        </div>
                        <div><button class="btn bg-primary rounded-0 "><i class="fa-solid fa-plus"></i></button><button
                                class="btn bg-danger rounded-0"><i class="fa-solid fa-trash"></i></button></div>
                    </div>
                    <div class="input-group mb-3">
                    <form action="" method="post" class="d-flex w-100">
                        <input type="text" class="form-control rounded-0" name="search"
                            placeholder="Tìm sản phẩm..." aria-label="Recipient's ordername"
                            aria-describedby="button-addon2" value="<?=$key ?>">
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
                                    <th scope="col"> </th>
                                    <th scope="col">Khách hàng</th>
                                    
                                    <th scope="col">Email</th>
                                    <th scope="col">Điện thoại</th>
                                    <th scope="col">Địa chỉ</th>
									
                                    <th scope="col">Ngày tạo</th>
									<th scope="col">Trạng thái</th>
                                    <th scope="col"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list_order as $value): ?>
                                <tr>

                                    <td class="">
                                        <input type="checkbox">
                                    </td>
                                    <th scope="row"><?=$value['id']?></th>
                                    <td>
                                        <img width="30px" height="30px" src="../public/image/order.png"
                                            alt="<?=$value['deliveryname']?>">
                                    </td>
                                    <td class=""><?=$value['deliveryname']?></td>
                                   
                                   
                                    <td><?=$value['deliveryemail']?></td>
                                    <td><?=$value['deliveryphone']?></td>
                                    <td><?=$value['deliveryaddress']?></td>
                                    <td class=''>

                                        <?=$value['created_at']?></td>
									<td class=''>
									<?php if($value['status']==1): ?>
										<span class="bg-warning p-1 rounded ">Đang vận chuyển</span>
										<?php else: ?>
											<span class=" bg-danger p-1 rounded">Đơn hàng mới</span>
										<?php endif; ?>
                                        </td>
                                    <td class="text-right">
                                        <button class="btn bg-primary"><i
                                                class="fa-solid fa-pen-to-square"></i></button>
                                        <button class="btn bg-warning"><i class="fa-solid fa-eye"></i></button>
                                        <button class="btn bg-danger"><i class="fa-solid fa-xmark"></i></button>
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
                                    <span class="page-link"><a href="?option=order&page=1">Đầu</a></span>
                                </li>
                                <?php for($i=1;$i<=$number_of_page;$i++): ?>
                                <li class="page-item"> <a class='page-link'
                                        href='?option=order&page=<?=$i?>'><?=$i?></a></li>
                                <?php endfor; ?>
                                <li class="page-item">
                                    <a class="page-link" href="?option=order&page=<?=--$i?>">Cuối</a>
                                </li>
                            </ul>
                            </nav>
                        </div>
                        <div><button class="btn bg-primary rounded-0 ">Thêm</button><button
                                class="btn bg-danger rounded-0">Thùng rác</button></div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    </div>
<?php require_once("../views/backend/footer.php") ?>