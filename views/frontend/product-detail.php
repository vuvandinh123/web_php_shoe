<?php require_once('views/frontend/header.php'); ?>
<?php

use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
$slug = $_REQUEST['slug'];
$row_product = Product::join('brand','brand.id','=','product.brand_id')->where(([['product.slug', '=', $slug], ['product.status', '=', '1']]))
                    ->select("product.*",'brand.name as brand_name')
                    ->first();

$row_image = Image::join('product','product.id','=','image.id_product')->where(([['product.slug', '=', $slug], ['product.status', '=', '1']]))
->select("image.*")
->get();



// $row_product2 = Product::where(([['slug', '=', $slug], ['status', '=', '1']]))->first();

$img = Image::where('id_product', $row_product->id)->first();
$title = $row_product['name'];
$list_product = Product::join('brand','brand.id','=','product.brand_id')->where([['product.status','=','1'],['brand.id','=',$row_product->brand_id],['product.id','!=',$row_product->id]])
                    ->select("product.*")->limit(5)
                    ->get();

                    // $results = DB::select('select * from users where id = :id', ['id' => 1]);
$list_product2 = Product::where('status', '=', 1)->orderBy('price', 'desc')->limit(5)->get();
// print_r($list_product2);
?>

<div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb mb-0 mt-3 d-flex align-items-baseline">
            <li class="breadcrumb-item text-dark m-0"><a class="text-cam font-chu" href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a class="text-dark font-chu" href="#">Sản phẩm</a></li>
            <li class="breadcrumb-item active font-chu mt-1" aria-current="page"><?=$title?></li>
        </ol>
    </nav>

    <div class="row my-md-4">
        <div class="col-md-5">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators d-none">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                        <?php for($i=1;$i<=count($row_image);$i++):?>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?=$i?>"
                        aria-label="Slide <?=$i+1?>"></button>
                        <?php endfor;?>
                </div>
                <div class="carousel-inner">

                    <div class="carousel-item active" data-bs-interval="10000" data-bs-toggle="modal"
                        data-bs-target="#exampleModal-img" data-bs-whatever="@mdo">
                        <img title="Nike Air Force 1 07 Cam" id="img1"
                            src="public/image/product/<?=$row_product->image?>" class="d-block w-100"
                            alt="<?=$row_product->slug?>">
                        <div class="carousel-caption d-none d-md-block">
                            <h6><?=$title?></h6>

                        </div>
                    </div>

                    <?php foreach ($row_image as $value ):?>
                    <div class="carousel-item" data-bs-interval="2000 " data-bs-toggle="modal"
                        data-bs-target="#exampleModal-img" data-bs-whatever="@mdo">
                        <img title="Nike Air Force 1 07 Cam" id='img1' src="public/image/product/<?=$value->name?>"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>

                    <?php endforeach;?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <hr>
            <?php $i = 0;?>
            <a class="link-side" data-bs-target="#carouselExampleDark" data-bs-slide-to=<?=$i++?> href="#img1"><img
                    style="width:70px;" src="public/image/product/<?=$row_product->image?>" alt=""></a>
            <?php  foreach ($row_image as $value ):?>
            <a class="link-side" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?= $i++?>" href="#img1"><img
                    style="width:70px;" src="public/image/product/<?=$value->name?>" alt=""> </a>
            <?php endforeach;?>
        </div>
        <div class="col-md-7">
            <h1 class="my-3 text-capitalize"><?=$title?></h1>
            <div class="row my-md-3">
                <div class="col-md-3">
                    <span><b>Thương hiệu : </b> <?=$row_product->brand_name?></span>
                </div>
                <div class="col-md">
                    <span><b>Mã</b> : <?=$row_product->id?></span>
                </div>
            </div>
            <h2 class="my-3 text-danger"><?=number_format($row_product->price) ?>đ</h2>
            <div class="row my-3">
                <div class="col-md-4">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary rounded-0 w-100" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <i class="fa-solid fa-truck-fast"></i> Đặt hàng
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Thông báo</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn muốn mua sản phẩm: <b class="text-danger">Nike Air Force 1 07 Cam</b>
                                    <div class="row">
                                        <div class="col-6">
                                            <img class="w-100 h-100"
                                                src="https://bizweb.dktcdn.net/100/437/253/products/sp8-cam-trang.jpg?v=1640061137570"
                                                alt="">
                                        </div>
                                        <div class="col-6">
                                            <div class="col-12 mb-2 mt-2"><b>Thương Hiệu:</b> NIKE</div>
                                            <div class="col-12 mb-2"><b>Size:</b> 29</div>
                                            <div class="col-12 mb-2"><b>Màu:</b> Cam</div>
                                            <div class="col-12 "><b>Giá:</b> 2.500.000 đ </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal-mua-hang">Xác Nhận</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <button type="button" class="btn btn-primary btn-lg my-3 py-2"><i class="fa-solid fa-truck-fast"></i> Đặt hàng</button> -->

                </div>
                <?php $uri = $_SERVER['REQUEST_URI']; $_SESSION['url']=$uri; ?>
                <div class="mt-2 mt-md-0 col-md-4"><a href="?option=cart&id=<?= $row_product->id ?>" title="Thêm vào giỏ hàng"
                        class="btn btn-danger w-100 rounded-0 btn btn-primary" id="liveToastBtn"><i
                            class="fa-solid fa-cart-shopping"></i> Thêm
                        vào giỏ hàng</a></div>

                <!-- ---------------------------------------------------------------- -->

                <div class="mt-2 mt-md-0 col-md-4">
                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <i class="fa-solid fa-cart-shopping rounded me-2 text-dark"></i>

                                <strong class="me-auto text-danger">Xác Nhận</strong>
                                <small>1 mins ago</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body bg-light">
                                Bạn đã thêm sản phẩm vào giỏ hàng !
                            </div>
                        </div>
                    </div>
                    <script>
                    const toastTrigger = document.getElementById('liveToastBtn')
                    const toastLiveExample = document.getElementById('liveToast')
                    if (toastTrigger) {
                        toastTrigger.addEventListener('click', () => {
                            const toast = new bootstrap.Toast(toastLiveExample)

                            toast.show()
                        })
                    }
                    </script>
                </div>

            </div>
            <div class="row">
                <div class="col-5"><label class="me-3 fw-normal" for="so-luong">Số lượng: </label><input id="so-luong"
                        style="width:40px" type="number" value="1" min="1" max="9"></div>
                <div class="col-1"></div>

            </div>
            <div class="row mt-2">

                <div class="btn-group me-2 col-3 " role="group" aria-label="First group">
                    <button type="button" class="btn rounded-0 fs-6 fw-normal">29</button>
                    <button type="button" class="btn ">30</button>
                    <button type="button" class="btn ">31</button>
                    <button type="button" class="btn rounded-0 ">32</button>
                </div>
            </div>
            <a class="text-primary" href="?option=page&cat=huong-dan-chon-size">Xem Hướng dẫn chọn size</a>
            <p>Sự rạng rỡ tồn tại trong Nike Air Force 1 07, quả bóng b-ball OG mang đến một sự thay đổi mới mẻ
                về những gì bạn biết rõ nhất. Nó có chất liệu da mịn, vẻ ngoài táo bạo và lượng đèn flash hoàn
                hảo để khiến bạn tỏa sáng.</p>
            <p>Màu sắc hiển thị: Trắng / Trắng / Đội cam
                Phong cách: DC2911-101</p>
            <div class="free">
                <h6 class="mb-3">PHÍ VẬN CHUYỂN TOÀN QUỐC</h6>
                <h6>ĐỔI TRẢ MIỄN PHÍ</h6>
                <P>Hỗ trợ dổi trả sản phẩm trong vòng 3 đến 5 ngày, nếu không vừa size, sản phẩm bị lỗi (giữ sản
                    phẩm sạch và chưa qua sử dụng) bạn sẽ đổi hoặc trả sản phẩm mà không tốn phí.</P>
                <H6>THANH TOÁN</H6>
                <P>(Thanh toán khi nhận hàng)</P>
                <H6>TỔNG ĐÀI BÁN HÀNG</H6>
                <p class="text-danger m-0">190063333</p>
                <p>(Từ 8:30 - 21:30 mỗi ngày)</p>
            </div>
        </div>
    </div>
    <div class="row container chi-tiet mt-3 mt-md-0">
        <div class="col-md-12">
            <button class="p-2 m-x-0 bg-danger text-light border"><a class='fw-bold text-white' href="#thong-tin">Thông tin chi tiết</a>
                <b></b> </button>
            <button class="p-2 bg-secondary text-light border thuong-hieu" data-bs-toggle="modal"
                data-bs-target="#exampleModal"><b>Thương hiệu</b> </button>
            <div class="thong-tin p-3 border" id="thong-tin">
                <?=$row_product->detail?>
            </div>
        </div>
    </div>

</div>
<!-- ---    ---------------card- 1 --------------- -->


<div class="container-md px-4">
    <h1 class="text-center fs-1 mt-5 pt-5">SẢN PHẨM TƯƠNG TỰ</h1>
    <p class="text-center">sản phẩm cùng hãng</p>

    <div class="row row-cols-2 row-cols-md-5 g-4">
        <?php foreach ($list_product as  $values) : ?>
        <?php $list_image = Image::join('product', 'product.id', '=', 'image.id_product')->where([['product.status', '!=', '0'], ['image.id_product', '=', $values->id]])
            ->select("image.*")->get();
        $dem = count($list_image);
        // echo $dem;
?>

        <div class="col ">
            <div class="card h-100 border border-0">
                <?php if ($values->pricesale != 0) : ?>
                <span class="sale"><?=ceil(((($values->pricesale-$values->price)/$values->pricesale)*100)) ?>%</span>
                <?php endif; ?>
                <a class="position-relative" href="?option=product&slug=<?=$values->slug?>">
                    <input type="radio" name="img-<?= ++$img_id ?>" id="img1-<?= $img_id ?>" checked>
                    <div class="<?php if($dem>=1) echo 'card-hover'?>" title="<?= $values->name ?>">
                        <img src="public/image/product/<?= $values->image ?>" class="card-img-top card-item"
                            alt="<?= $values->name ?>">
                        <?php if($dem>0):?>
                        <img src="public/image/product/<?= $list_image[0]->name ?>" class="card-img-top card-item"
                            alt="<?= $values->name ?>">
                        <?php endif;?>
                    </div>
                    <?php if($dem>3):?>
                    <input type="radio" name="img-<?=$img_id?>" id="img2-<?=$img_id?>">
                    <div class="card-hover" title="Nike Blazer x sacai x KAWS">
                        <img src="public/image/product/<?=$list_image[1]->name?>?>" class="card-img-top card-item"
                            alt="Nike Blazer x sacai x KAWS">
                        <img src="public/image/product/<?=$list_image[2]->name?>" class="card-img-top card-item"
                            alt="Nike Blazer x sacai x KAWS">
                    </div>
                    <?php endif;?>
                    <div class="size fs-6">
                        <span class="size-item">39</span>
                        <span class="size-item"></span>
                        <span class="size-item">40</span>
                        <span class="size-item">41</span>
                        <span class="size-item">+2</span>
                    </div>
                </a>
                
                <a href="?option=cart&id=<?= $values->id ?>"><span class="bag" title="Thêm vào giỏ hàng"><i class="fa-solid fa-bag-shopping"></i></span></a>
                <div class="card-body">
                    <h5 class="card-title"><a href="#"><?= $values->name ?> </a> </h5>
                    <p><?= $values->brand ?></p>
                    <div class="row">
                        <div class="col-md-5">
                            <h5 class="price  text-danger ">
                                <?php echo number_format($values->price) ?>đ</h5>
                        </div>
                        <?php if ($values->pricesale != 0) : ?>
                        <div class="col-md-6">
                            <h5 class="text-decoration-line-through text-black-50">
                                <?= number_format($values->pricesale) ?>đ</h5>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="shoer-list">
                        <div class="shoer-list-item"><label for="img1-<?= $img_id ?>"><img
                                    src="public/image/product/<?= $values->image ?>" alt="<?= $values->name ?>"></label>
                        </div>

                        <?php if($dem>3):?>
                        <div class="shoer-list-item"><label for="img2-<?= $img_id ?>"><img
                                    src="public/image/product/<?= $list_image[3]->name ?>"
                                    alt="<?= $values->name ?>"></label>
                        </div>
                        <?php endif;?>

                    </div>
                </div>

            </div>
        </div>
        <?php endforeach; ?>
    </div>




</div>
</div>
</div>
<!-- ---    ---------------card- 2 --------------- -->


<div class="container-md px-4">
    <h1 class="text-center fs-1 mt-5 pt-5">SALE GIẢM GIÁ THÁNG 1</h1>
    <p class="text-center">SALE GIẢM GIÁ THÁNG 1</p>

    <div class="row row-cols-2 row-cols-md-5 g-4">
        <?php foreach ($list_product2 as  $values) : ?>
        <?php $list_image = Image::join('product', 'product.id', '=', 'image.id_product')->where([['product.status', '!=', '0'], ['image.id_product', '=', $values->id]])
            ->select("image.*")->get();
        $dem = count($list_image);
        // echo $dem;
?>
        <div class="col ">
            <div class="card h-100 border border-0">
                <?php if ($values->pricesale != 0) : ?>
                <span class="sale"><?=ceil(((($values->pricesale-$values->price)/$values->pricesale)*100)) ?>%</span>
                <?php endif; ?>
                <a class="position-relative" href="?option=product&slug=<?=$values->slug?>">
                    <input type="radio" name="img-<?= ++$img_id ?>" id="img1-<?= $img_id ?>" checked>
                    <div class="<?php if($dem>=1) echo 'card-hover'?>" title="<?= $values->name ?>">
                        <img src="public/image/product/<?= $values->image ?>" class="card-img-top card-item"
                            alt="<?= $values->name ?>">
                        <?php if($dem>0):?>
                        <img src="public/image/product/<?= $list_image[0]->name ?>" class="card-img-top card-item"
                            alt="<?= $values->name ?>">
                        <?php endif;?>
                    </div>
                    <?php if($dem>3):?>
                    <input type="radio" name="img-<?=$img_id?>" id="img2-<?=$img_id?>">
                    <div class="card-hover" title="Nike Blazer x sacai x KAWS">
                        <img src="public/image/product/<?=$list_image[1]->name?>?>" class="card-img-top card-item"
                            alt="Nike Blazer x sacai x KAWS">
                        <img src="public/image/product/<?=$list_image[2]->name?>" class="card-img-top card-item"
                            alt="Nike Blazer x sacai x KAWS">
                    </div>
                    <?php endif;?>
                    <div class="size fs-6">
                        <span class="size-item">39</span>
                        <span class="size-item"></span>
                        <span class="size-item">40</span>
                        <span class="size-item">41</span>
                        <span class="size-item">+2</span>
                    </div>
                </a>
                <a href="?option=cart&id=<?= $values->id ?>"><span class="bag" title="Thêm vào giỏ hàng"><i class="fa-solid fa-bag-shopping"></i></span></a>
                <div class="card-body">
                    <h5 class="card-title"><a href="#"><?= $values->name ?> </a> </h5>
                    <p><?= $values->brand ?></p>
                    <div class="row">
                        <div class="col-md-5">
                            <h5 class="price  text-danger ">
                                <?php echo number_format($values->price) ?>đ</h5>
                        </div>
                        <?php if ($values->pricesale != 0) : ?>
                        <div class="col-md-6">
                            <h5 class="text-decoration-line-through text-black-50">
                                <?= number_format($values->pricesale) ?>đ</h5>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="shoer-list">
                        <div class="shoer-list-item"><label for="img1-<?= $img_id ?>"><img
                                    src="public/image/product/<?= $values->image ?>" alt="<?= $values->name ?>"></label>
                        </div>

                        <?php if($dem>3):?>
                        <div class="shoer-list-item"><label for="img2-<?= $img_id ?>"><img
                                    src="public/image/product/<?= $list_image[3]->name ?>"
                                    alt="<?= $values->name ?>"></label>
                        </div>
                        <?php endif;?>

                    </div>
                </div>

            </div>
        </div>
        <?php endforeach; ?>
    </div>




</div>
</div>
</div>
<!-- Modal INPUT -->



<div class="modal fade" id="exampleModal-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header row">

                <div class="col-5 text-center"><a class="text-danger d-block w-100 border-end border-dark ms-3"
                        data-bs-toggle="modal" data-bs-target="#exampleModal-2" href="">Đăng Nhập</a></div>
                <div class="col-5 text-center"><a class="text-dark d-block w-100 " data-bs-toggle="modal"
                        data-bs-target="#exampleModal-3" href="">Đăng ký</a></div>




                <button type="button" class="btn-close col-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3">
                    <div class="col-md-12">
                        <label for="inputEmail4 text-dark" class="form-label">Email*</label><br>
                        <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <br>
                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Password*</label><br>
                        <input type="password" class="form-control" id="inputPassword4">
                    </div>
                    <a class="text-primary" href="#">Quên mật khẩu?</a>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary w-100 ">Đăng Nhập</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer row">
                <p class="text-center text-dang-nhap-qua">HOẶC ĐĂNG NHẬP QUA</p>
                <div class="row">
                    <div class="col-6 ">
                        <button type="submit" class="btn btn-primary  w-100"><i
                                class="fa-brands fa-facebook-f me-4"></i>Facebook</button>
                    </div>
                    <div class="col-6 ">
                        <button type="submit" class="btn btn-danger w-100 "><i
                                class="fa-brands fa-google me-4"></i>Google</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal INPUT dang ky -->



<div class="modal fade" id="exampleModal-3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header row">

                <div class="col-5 text-center"><a class="text-dark d-block w-100 border-end border-dark ms-3"
                        data-bs-toggle="modal" data-bs-target="#exampleModal-2" href="">Đăng Nhập</a></div>
                <div class="col-5 text-center"><a class="text-danger d-block w-100 " data-bs-toggle="modal"
                        data-bs-target="#exampleModal-3 " href="">Đăng ký</a></div>




                <button type="button" class="btn-close col-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3">

                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">HỌ*</label><br>
                        <input type="text" class="form-control" id="inputCity" placeholder="Nhập Họ">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">TÊN*</label><br>
                        <input type="text" class="form-control" id="inputCity" placeholder="Nhập Tên">
                    </div>

                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">EMAIL*</label><br>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Nhập Email">
                    </div>
                    <br>
                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">MẬT KHẨU*</label><br>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Nhập mật khẩu">
                    </div>


                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary w-100 ">Đăng Ký</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer row">
                <p class="text-center text-dang-nhap-qua">HOẶC ĐĂNG NHẬP QUA</p>
                <div class="row">
                    <div class="col-6 ">
                        <button type="submit" class="btn btn-primary  w-100"><i
                                class="fa-brands fa-facebook-f me-4"></i>Facebook</button>
                    </div>
                    <div class="col-6 ">
                        <button type="submit" class="btn btn-danger w-100 "><i
                                class="fa-brands fa-google me-4"></i>Google</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal INPUT mua-hang-->



<div class="modal fade" id="exampleModal-mua-hang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header row">

                <h5 class="modal-title text-danger col-10">Nhập địa chỉ nhận hàng</h5>
                <button type="button" class="btn-close col-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3">

                    <div class="col-6">
                        <label for="inputEmail4" class="form-label">HỌ*</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="Nhập Họ">
                    </div>
                    <div class="col-6">
                        <label for="inputEmail4" class="form-label">TÊN*</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="Nhập Tên">
                    </div>


                    <div class="col-12">
                        <label for="inputemail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputemail" placeholder="Nhập Email">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-number">Số điện thoại</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Nhập số điện thọai">
                    </div>
                    <div class="col-md-5">
                        <label for="inputCity" class="form-label">Địa chỉ </label>
                        <input type="text" class="form-control" id="inputCity" placeholder="Thôn Xã">
                    </div>
                    <div class="col-md-3">
                        <label for="inputZip" class="form-label">Quận/Huyện</label>
                        <input type="text" class="form-control" id="inputZip" placeholder="Quận/Huyện">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Thành phố</label>
                        <select id="inputState" class="form-select">
                            <option selected>Hồ Chí Minh</option>
                            <option>Hà Nội</option>
                        </select>
                    </div>



                </form>
            </div>
            <div class="modal-footer row">

                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-danger w-100 ">Xác Nhận</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ----------------------------------------------------------------    -->



<div class="modal fade" id="exampleModal-img" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content bg-dark">
            <div class="modal-header border border-0">
                <div class="icon-img col align-self-end">
                    <i class="fa-solid fa-arrow-rotate-left text-light"></i>
                    <i class="fa-solid fa-arrow-rotate-right text-light"></i>
                    <i class="fa-solid fa-arrow-right-arrow-left text-light"></i>
                    <i class="fa-solid fa-arrows-up-down text-light"></i>
                    <i class="fa-solid fa-share-nodes text-light"></i>
                    <i class="fa-regular fa-copy text-light"></i>
                    <i class="fa-solid fa-magnifying-glass-plus text-light"></i>
                    <i class="fa-solid fa-magnifying-glass-minus text-light"></i>
                    <i class="fa-solid fa-download text-light"></i>
                </div>

                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body ">

                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">


                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="public/image/product/<?=$row_product->image?>" class="d-block mx-auto" alt="...">

                        </div>
                        <?php foreach ($row_image as $value ):?>
                        <div class="carousel-item">
                            <img src="public/image/product/<?=$value->name?>" class="d-block mx-auto" alt="...">

                        </div>
                        <?php endforeach;?>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="modal-footer  border border-0">
                <div class=" icon2-img nav-img">
                    <a class="link-side-2" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" href=""><img
                            style="width:80px;"
                            src="https://bizweb.dktcdn.net/100/437/253/products/sp85-cam-trang.png?v=1640061275060"
                            alt=""></a>
                    <a class="link-side-2" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" href=""><img
                            style="width:80px;"
                            src="https://bizweb.dktcdn.net/100/437/253/products/sp87-cam-trang.png?v=1640061275060"
                            alt=""></a>
                    <a class="link-side-2" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" href=""><img
                            style="width:80px;"
                            src="https://bizweb.dktcdn.net/100/437/253/products/sp88-cam-trang.png?v=1640061275060"
                            alt=""></a>
                    <a class="link-side-2" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" href=""><img
                            style="width:80px;"
                            src="https://bizweb.dktcdn.net/100/437/253/products/sp84-cam-trang.png?v=1640061275060"
                            alt=""></a>
                    <a class="link-side-2 " data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" href=""><img
                            style="width:80px;"
                            src="https://bizweb.dktcdn.net/100/437/253/products/sp86-cam-trang.png?v=1640061275060"
                            alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php require_once('views/frontend/footer.php'); ?>