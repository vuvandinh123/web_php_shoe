<?php

use App\Models\Menu;
use App\Libraries\Upload;
use App\Libraries\MyClass;

$list_menu = Menu::where('status', '!=', 0)->get();
$html_parent_id = '';
$html_sort_order = '';
foreach ($list_menu as $value) {
    $html_parent_id .= "<option value='" . $value->id . "'>" . $value->name . "</option>";
    $html_sort_order .= "<option value='" . $value->sort_order . "'>Sau: " . $value->name . "</option>";
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
                    <h1 class="font-weight-bold text-danger">Thêm menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="?option=menu&sort=desc&page=1">Menu</a></li>
                        <li class="breadcrumb-item active">Thêm menu</li>
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
                    <div>
                        <p title="Lưu" class="btn rounded-0 m-0 p-0">
                            <img width="20px" height="20px" src="../public/image/icon/diskette.png" alt="">
                        </p>
                    </div>


                </div>
            </div>
            <div class="card-body">

                <!-- <form action="?option=menu&cat=process" method="post" enctype="multipart/form-data"> -->
                <div class="row">
                    <div class="col-3">
                        <div id="accordion">
                            <div class="card">
                                <div id="collapseOne11">

                                    <div class="card-body">
                                        <p class="m-0 p-0"><strong>Vị trí</strong></p>
                                        <select id="inputState" class="form-control">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                           Danh mục sản phẩm
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Thương hiệu
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Chủ đề bài viết
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Trang đơn
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Tùy biến liên kết
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                    <table class="table table-hover ">
                        <thead>
                            <tr class="bg-primary">

                                
                                <th scope="col">#</th>
                                <th scope="col">id</th>
                                <th scope="col">Tên menu/liên kết</th>
                                <th scope="col">Vị trí</th>
                                <th scope="col">Sắp xếp</th>
                                <th scope="col">Chức năng</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr>

                                <td class="">
                                    <input type="checkbox">
                                </td>
                                <th scope="row"><?=$value['id']?></th>
                                
                                <td class=""><?=$value['name']?></td>

                                <td>
                                   <?=$value->link?>
                                </td>
                                <td class="text-right d-flex">
                                    <?php if($value->status=='1'):?>
                                    <a title="Tắt" class="btn btn-primary"
                                        href="index.php?option=menu&cat=status&sort=<?=$sort?>&page=<?=$j?>&id=<?=$value->id?>">
                                        <i class="fa-solid fa-toggle-on"></i></a>
                                    <?php else:?>
                                    <a title="Bật" class="btn btn-danger"
                                        href="index.php?option=menu&cat=status&sort=<?=$sort?>&page=<?=$j?>&id=<?=$value->id?>"><i
                                            class="fa-solid fa-toggle-off "></i></a>
                                    <?php endif;?>
                                    <a title="sửa" class="mx-2 btn btn-warning"
                                        href="index.php?option=menu&cat=edit&id=<?=$value->id?>"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a title="xem" class="mr-2 btn btn-primary"
                                        href="index.php?option=menu&cat=show&id=<?=$value->id?>"><i
                                            class="fa-solid fa-eye"></i></a>
                                    <a id="liveToastBtn" title="Xóa vào thùng rác" class="btn btn-danger mr-2"
                                        href="index.php?option=menu&cat=delete&id=<?=$value->id?>"><i
                                            class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                          
                        </tbody>
                    </table>
                    </div>

                </div>
                <div class="d-flex justify-content-between">
                    <input name="them" class="btn bg-danger" type="submit" value="Thêm">
                    <input class="btn bg-info" type="reset" value="Hủy">
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