<?php

use App\Models\Menu;
use App\Models\Category;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Brand;
use App\Libraries\Upload;
use App\Libraries\MyClass;

$list_menu = Menu::where('status', '!=', 0)->orderBy('position', 'asc')->orderBy('sort_order', 'asc')->get();

$list_category = Category::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
$list_brand = Brand::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
$list_topic = Topic::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
$list_page = Post::where('status', '!=', 0)->where('type', 'page')->orderBy('created_at', 'desc')->get();
?>
<?php

?>

<?php require_once("../views/backend/header.php") ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="font-weight-bold text-danger">MENU</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>

                        <li class="breadcrumb-item active">MENU</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between mb-3">


                <div></div>
                    <div>
                       
                       
                        <a class="btn bg-danger" href="?option=menu&cat=recycle"><i class="fa-solid fa-trash"></i></a>
                    </div>


                </div>
            </div>
            <div class="card-body">

                <form action="?option=menu&cat=process" method="post">
                    <div class="row">
                        <div class="col-3">
                            <div id="accordion">
                                <div class="card">
                                    <div id="collapseOne11">
                                        <div class="card-body">
                                            <p class="m-0 p-0"><strong>Vị trí</strong></p>
                                            <select name="position" id="inputState" class="form-control">
                                                <option value="mainmenu" selected>Main Menu</option>
                                                <option value="footermenu">footer Menu</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingcategory">
                                        <h5 class="mb-0">
                                            <span class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapsecategory" aria-expanded="false"
                                                aria-controls="collapsecategory">
                                                Danh mục sản phẩm
                                            </span>
                                        </h5>
                                    </div>
                                    <div id="collapsecategory" class="collapse" aria-labelledby="headingcategory"
                                        data-parent="#accordion">
                                        <div class="card-body">

                                            <?php $i = 0;
                                            foreach ($list_category as $value) : ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    value="<?= $value->id ?>" name="categoryid[]"
                                                    id="defaultCheck<?= $value->id ?>">
                                                <label class="form-check-label" for="defaultCheck<?= $value->id ?>">
                                                    <?= $value->name ?>
                                                </label>
                                            </div>
                                            <?php endforeach; ?>
                                            <button type="submit" name="addcategory"
                                                class="bg-info btn w-100 mt-2 ">Thêm</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingbrand">
                                        <h5 class="mb-0">
                                            <span class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapsebrand" aria-expanded="false"
                                                aria-controls="headingbrand">
                                                THƯƠNG HIỆU
                                            </span>
                                        </h5>
                                    </div>
                                    <div id="collapsebrand" class="collapse" aria-labelledby="headingbrand"
                                        data-parent="#accordion">
                                        <div class="card-body">

                                            <?php $i = 0;
                                            foreach ($list_brand as $value) : ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    value="<?= $value->id ?>" name="brandid[]"
                                                    id="defaultCheckbrand<?= $value->id ?>">
                                                <label class="form-check-label"
                                                    for="defaultCheckbrand<?= $value->id ?>">
                                                    <?= $value->name ?>
                                                </label>
                                            </div>
                                            <?php endforeach; ?>
                                            <button type="submit" name="addbrand"
                                                class="bg-info btn w-100 mt-2 ">Thêm</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTopic">
                                        <h5 class="mb-0">
                                            <span class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapsetopic" aria-expanded="false"
                                                aria-controls="headingTopic">
                                                CHỦ ĐỀ BÀI VIẾT
                                            </span>
                                        </h5>
                                    </div>
                                    <div id="collapsetopic" class="collapse" aria-labelledby="headingTopic"
                                        data-parent="#accordion">
                                        <div class="card-body">

                                            <?php $i = 0;
                                            foreach ($list_topic as $value) : ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    value="<?= $value->id ?>" name="topicid[]"
                                                    id="defaultChecktopic<?= $value->id ?>">
                                                <label class="form-check-label"
                                                    for="defaultChecktopic<?= $value->id ?>">
                                                    <?= $value->name ?>
                                                </label>
                                            </div>
                                            <?php endforeach; ?>
                                            <button type="submit" name="addtopic"
                                                class="bg-info btn w-100 mt-2 ">Thêm</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingPage">
                                        <h5 class="mb-0">
                                            <span class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapsepage" aria-expanded="false"
                                                aria-controls="headingPage">
                                                TRANG ĐƠN
                                            </span>
                                        </h5>
                                    </div>
                                    <div id="collapsepage" class="collapse" aria-labelledby="headingPage"
                                        data-parent="#accordion">
                                        <div class="card-body">

                                            <?php $i = 0;
                                            foreach ($list_page as $value) : ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    value="<?= $value->id ?>" name="pageid[]"
                                                    id="defaultCheckpage<?= $value->id ?>">
                                                <label class="form-check-label" for="defaultCheckpage<?= $value->id ?>">
                                                    <?= $value->title ?>
                                                </label>
                                            </div>
                                            <?php endforeach; ?>
                                            <button type="submit" name="addpage"
                                                class="bg-info btn w-100 mt-2 ">Thêm</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTBLK">
                                        <h5 class="mb-0">
                                            <span class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseTBLK" aria-expanded="false"
                                                aria-controls="headingPage">
                                                TÙY BIẾN LIÊN KẾT
                                            </span>
                                        </h5>
                                    </div>
                                    <div id="collapseTBLK" class="collapse" aria-labelledby="headingTBLK"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <form action="?option=menu&cat=process">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tên menu</label>
                                                    <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="Tên menu">

                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Liên kết</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">#</span>
                                                        </div>
                                                        <input name="link" type="text" class="form-control" placeholder="Liên kết"
                                                            aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                
                                                <button name="addcustom" type="submit" class="btn btn-primary">Thêm</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            

                        </div>
                        <div class="col-9">
                            <table id="table" class="table table-hover ">
                                <thead>
                                    <tr class="bg-primary">


                                        <th scope="col">#</th>
                                        <th scope="col">id</th>
                                        <th scope="col">Tên menu/liên kết</th>
                                        <th scope="col">Vị trí</th>
                                        <th scope="col">Sắp xếp</th>
                                        <th scope="col">Chức năng</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list_menu as $value) : ?>
                                    <tr>

                                        <td class="">
                                            <input type="checkbox">
                                        </td>
                                        <th scope="row"><?= $value['id'] ?></th>

                                        <td class="">
                                            <h6><b><?= $value['name'] ?></b> </h6>
                                            <p class="p-0 m-0"><?= $value['link'] ?></p>
                                        </td>
                                        <td class=""><?= $value['position'] ?></td>
                                        <td class=""><?= $value->sort_order ?>
                                        </td>
                                        <td class="text-right d-flex">
                                            <?php if ($value->status == '1') : ?>
                                            <a title="Tắt" class="btn btn-primary"
                                                href="index.php?option=menu&cat=status&&id=<?= $value->id ?>">
                                                <i class="fa-solid fa-toggle-on"></i></a>
                                            <?php else : ?>
                                            <a title="Bật" class="btn btn-danger"
                                                href="index.php?option=menu&cat=status&id=<?= $value->id ?>"><i
                                                    class="fa-solid fa-toggle-off "></i></a>
                                            <?php endif; ?>
                                            <a title="sửa" class="mx-2 btn btn-warning"
                                                href="index.php?option=menu&cat=edit&id=<?= $value->id ?>"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="xem" class="mr-2 btn btn-primary"
                                                href="index.php?option=menu&cat=show&id=<?= $value->id ?>"><i
                                                    class="fa-solid fa-eye"></i></a>
                                            <a id="liveToastBtn" title="Xóa vào thùng rác" class="btn btn-danger mr-2"
                                                href="index.php?option=menu&cat=delete&id=<?= $value->id ?>"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between">
                            <!-- <input type="submit" name="UPDATE_SORT_ORDER" class="btn bg-danger"  value="Lưu sắp xếp"> -->

                        </div>
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