<?php
use App\Models\Menu;

$sort = $_REQUEST['sort']??'';
$option = $_REQUEST['option'] ?? '';
$j = $_REQUEST['page']??'';
$hienthi = $_REQUEST['hienthi'] ?? 5;
 ?>


<?php
                $all=Menu::where('status', '=',0)->count();
                $pageNumber = $_REQUEST['page'] ?? 1 ;
                // $hienthi = 4;
                $linkhienthi = ($pageNumber - 1) * $hienthi;
                $number_of_page=ceil($all/$hienthi);
                $key = '';
                if(isset($_POST['search']) && !empty($_POST['search']))
                {
                    $key = $_POST['search'];
                    $list_menu = Menu::where('status', 1)->where('name','like',"%".$key.'%')->get();
} else {
        $list_menu = Menu::where('status', '=', 0)
            ->skip($linkhienthi)
            ->take($hienthi)
            ->orderBy('created_at', 'desc')->get();
}
                ?>
<?php require_once("../views/backend/header.php") ?>
<form action="?option=menu&cat=process" method="post">
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Menu</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
               
                    <div class="d-flex justify-content-between mb-3">


                    <a title="Quay lại" class="btn bg-primary rounded-0 fw-bold" href="?option=menu&sort=desc&page=1">
                        <img width="20px" height="20px" src="../public/image/icon/arrow.png" alt=""> Quay lại </a>
                   


               
                </div>
                <div class="input-group mb-3">
                    
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover ">
                        <thead>
                            <tr class="bg-primary">

                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                               
                                <th scope="col">Tên menu</th>
                                <th scope="col">Link</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_menu as $value): ?>
                            <tr>

                                <td class="">
                                    <input type="checkbox" name="check_id[]" value="<?=$value->id?>">
                                </td>
                                <th scope="row"><?=$value['id']?></th>
                               
                                <td class=""><?=$value['name']?></td>

                                <td>
                                   <?=$value->link?>
                                </td>
                                
                                <td class=''>

                                    <?=date_format($value['created_at'],"H:i:s d/m/Y ") ?></td>
                                <td class="text-right d-flex">
                                    
                                    <a title="phục hồi" class="mr-2 btn btn-primary"
                                        href="index.php?option=menu&cat=restore&id=<?=$value->id?>">Phục hồi</a>
                                    <a id="liveToastBtn" title="Xóa vào thùng rác" class="btn btn-danger mr-2"
                                        href="index.php?option=menu&cat=destroy&id=<?=$value->id?>"><i
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
                    <div><button type="submit" name="deletes" class="btn bg-danger rounded-0 ">Xóa</button></div>
                    <div>
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item">
                                    <span class="page-link"><a
                                            href="?option=menu&sort=<?=$sort ?>&page=1">Đầu</a></span>
                                </li>
                                <?php for($i=1;$i<=$number_of_page;$i++): ?>
                                <li class="page-item"> <a class=' page-link <?php if($j==$i)echo 'bg-primary' ?>'
                                        href='?option=menu&sort=<?=$sort?>&page=<?=$i?>'><?=$i?></a></li>
                                <?php endfor; ?>
                                <li class="page-item">
                                    <a class="page-link" href="?option=menu&sort=<?=$sort ?>&page=<?=--$i?>">Cuối</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div>
                        
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