<?php

use App\Models\Product;
use App\Models\Category;
use App\Models\Post;
use App\Models\Image;

$list_product = Product::where([['status', '=', 1], ['category_id', '!=', 32]])->limit(10)->orderBy('created_at', 'desc')->get();
$list_product2 = Product::where([['status', '=', 1], ['category_id', '=', 31],['category_id', '=', 31]])->limit(5)->get();
$list_product3 = Product::where([['status', '=', 1]])->limit(8)->get();
$list_accessory = Product::where([['status', '=', 1],['category_id', '=', 32]])->limit(8)->get();
$list_news = Post::where([['status', '=', 1], ['type', '=', 'post']])->limit(4)->get();
$uri = $_SERVER['REQUEST_URI']; $_SESSION['url']=$uri;

?>

<?php require_once('views/frontend/header.php') ?>
<?php require_once('views/frontend/mod-slider.php') ?>

<?php require_once('views/frontend/banner.php') ?>
<?php $img_id = 0;
$sale = 0;
?>

<div class="container mt-3 mb-5 bg-shadow">
    <h1 class="text-center fs-1 my-5 pt-5">SẢN PHẨM BÁN CHẠY</h1>
    <div class="row row-cols-2 row-cols-md-5 g-4">
        <?php foreach ($list_product as  $values) : ?>
            <?php $list_image = Image::join('product', 'product.id', '=', 'image.id_product')->where([['product.status', '!=', '0'], ['image.id_product', '=', $values->id]])->select("image.*")->get();
            $dem = count($list_image); ?>
            <div class="col ">
                <div class="card h-100 border border-0">
                    <?php if ($values->pricesale != 0) : ?>
                        <span class="sale"><?= ceil(((($values->pricesale - $values->price) / $values->pricesale) * 100)) ?>%</span>
                    <?php endif; ?>
                    <a class='position-relative' href="?option=product&slug=<?= $values->slug ?>">
                        <input type="radio" name="img-<?= ++$img_id ?>" id="img1-<?= $img_id ?>" checked>
                        <div class="<?php if ($dem >= 1) echo 'card-hover' ?>" title="<?= $values->name ?>">
                            <img src="public/image/product/<?= $values->image ?>" class="card-img-top card-item" alt="<?= $values->name ?>" loading="lazy">
                            <?php if ($dem > 0) : ?>
                                <img src="public/image/product/<?= $list_image[0]->name ?>" class="card-img-top card-item" alt="<?= $values->name ?>">
                            <?php endif; ?>
                        </div>
                        <?php if ($dem > 2) : ?>
                            <input type="radio" name="img-<?= $img_id ?>" id="img2-<?= $img_id ?>">
                            <div class="card-hover" title="Nike Blazer x sacai x KAWS">
                                <img src="public/image/product/<?= $list_image[1]->name ?>?>" class="card-img-top card-item" alt="Nike Blazer x sacai x KAWS">
                                <img src="public/image/product/<?= $list_image[2]->name ?>" class="card-img-top card-item" alt="Nike Blazer x sacai x KAWS">
                            </div>
                        <?php endif; ?>
                        <div class="size fs-6">
                        <span class="size-item">39</span>
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
                            <div class="shoer-list-item"><label for="img1-<?= $img_id ?>"><img src="public/image/product/<?= $values->image ?>" alt="<?= $values->name ?>"></label>
                            </div>

                            <?php if ($dem > 2) : ?>
                                <div class="shoer-list-item"><label for="img2-<?= $img_id ?>"><img src="public/image/product/<?= $list_image[2]->name ?>" alt="<?= $values->name ?>"></label>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</div>


<div class="container mt-3 mb-5 bg-shadow">
    <div class="content row">
        <div class="col-md-5 mb-4">
            <img class="w-100" src="https://bizweb.dktcdn.net/100/342/645/themes/701397/assets/banner_product_nangdong.jpg?1664094665337" alt="product-banner">
        </div>
        <div class="col-md-7 p-5">
            <h2 class="fs-1 mb-4">SNEAKER NĂNG ĐỘNG
            </h2>
            <p class="fs-3 mb-5">Sneaker đã trở thành một biểu tượng của xã hội, là một sản phẩm của thời đại với những
                thiết kế cổ điển và những điều đó đều nằm trong những đôi giày Sneaker Delta Shoes. Không lỗi thời với
                thời gian, mang dấu ấn cá tính khác biệt và tạo mọi sự lôi cuốn từ chính đôi giày Sneaker. Tự tạo cuộc
                chơi, tự tạo phong cách, đó là Delta Shoes</p>
            <a class="fs-2 " href="?option=product&category=giay-the-thao&page=1">XEM TẤT CẢ <i class="fa-solid fa-chevron-right"></i></a>
        </div>


    </div>
    <div class="row row-cols-2 row-cols-md-5 g-4">
        <?php foreach ($list_product2 as  $values) : ?>
            <?php $list_image = Image::join('product', 'product.id', '=', 'image.id_product')->where([['product.status', '!=', '0'], ['image.id_product', '=', $values->id]])
                ->select("image.*")->get();
            $dem = count($list_image);
            ?>

            <div class="col ">
                <div class="card h-100 border border-0">
                    <?php if ($values->pricesale != 0) : ?>
                        <span class="sale"><?= ceil(((($values->pricesale - $values->price) / $values->pricesale) * 100)) ?>%</span>
                    <?php endif; ?>
                    <a class='position-relative' href="?option=product&slug=<?= $values->slug ?>">
                        <input type="radio" name="img-<?= ++$img_id ?>" id="img1-<?= $img_id ?>" checked>
                        <div class="<?php if ($dem >= 1) echo 'card-hover' ?>" title="<?= $values->name ?>">
                            <img src="public/image/product/<?= $values->image ?>" class="card-img-top card-item" alt="<?= $values->name ?>" loading="lazy">
                            <?php if ($dem > 0) : ?>
                                <img src="public/image/product/<?= $list_image[0]->name ?>" class="card-img-top card-item" alt="<?= $values->name ?>">
                            <?php endif; ?>
                        </div>
                        <?php if ($dem > 2) : ?>
                            <input type="radio" name="img-<?= $img_id ?>" id="img2-<?= $img_id ?>">
                            <div class="card-hover" title="Nike Blazer x sacai x KAWS">
                                <img src="public/image/product/<?= $list_image[1]->name ?>?>" class="card-img-top card-item" alt="Nike Blazer x sacai x KAWS">
                                <img src="public/image/product/<?= $list_image[2]->name ?>" class="card-img-top card-item" alt="Nike Blazer x sacai x KAWS">
                            </div>
                        <?php endif; ?>
                        <div class="size fs-6">
                        <span class="size-item">39</span><span class="size-item"></span><span class="size-item">40</span><span class="size-item">41</span><span class="size-item">+2</span>
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
                            <div class="shoer-list-item"><label for="img1-<?= $img_id ?>"><img src="public/image/product/<?= $values->image ?>" alt="<?= $values->name ?>"></label>
                            </div>

                            <?php if ($dem > 2) : ?>
                                <div class="shoer-list-item"><label for="img2-<?= $img_id ?>"><img src="public/image/product/<?= $list_image[2]->name ?>" alt="<?= $values->name ?>"></label>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<div class="container mb-5">
    <h2 class="text-center fs-1 my-5">SALE THÁNG 12</h2>
    <div class="row">
        <div class="col-md-2 d-md-block d-none">
            <img class="w-100 h-100" height="650px" src="https://bizweb.dktcdn.net/100/405/012/themes/793822/assets/collection_2_banner.jpg?1670213852103" alt="">
        </div>
        <div class="col-md-10">
            <div class="row row-cols-2 row-cols-md-4 g-4">
                <?php foreach ($list_product3 as  $values) : ?>
                    <?php $list_image = Image::join('product', 'product.id', '=', 'image.id_product')->where([['product.status', '!=', '0'], ['image.id_product', '=', $values->id]])
                        ->select("image.*")->get();
                    $dem = count($list_image);
                    ?>

                    <div class="col ">
                        <div class="card h-100 border border-0">
                            <?php if ($values->pricesale != 0) : ?>
                                <span class="sale"><?= ceil(((($values->pricesale - $values->price) / $values->pricesale) * 100)) ?>%</span>
                            <?php endif; ?>
                            <a class='position-relative' href="?option=product&slug=<?= $values->slug ?>">
                                <input type="radio" name="img-<?= ++$img_id ?>" id="img1-<?= $img_id ?>" checked>
                                <div class="<?php if ($dem >= 1) echo 'card-hover' ?>" title="<?= $values->name ?>">
                                    <img src="public/image/product/<?= $values->image ?>" class="card-img-top card-item" alt="<?= $values->name ?>" loading="lazy">
                                    <?php if ($dem > 0) : ?>
                                        <img src="public/image/product/<?= $list_image[0]->name ?>" class="card-img-top card-item" alt="<?= $values->name ?>">
                                    <?php endif; ?>
                                </div>
                                <?php if ($dem > 2) : ?>
                                    <input type="radio" name="img-<?= $img_id ?>" id="img2-<?= $img_id ?>">
                                    <div class="card-hover" title="Nike Blazer x sacai x KAWS">
                                        <img src="public/image/product/<?= $list_image[1]->name ?>?>" class="card-img-top card-item" alt="Nike Blazer x sacai x KAWS">
                                        <img src="public/image/product/<?= $list_image[2]->name ?>" class="card-img-top card-item" alt="Nike Blazer x sacai x KAWS">
                                    </div>
                                <?php endif; ?>
                                <div class="size fs-6">
                                <span class="size-item">39</span><span class="size-item"></span><span class="size-item">40</span><span class="size-item">41</span><span class="size-item">+2</span>
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
                                    <div class="shoer-list-item"><label for="img1-<?= $img_id ?>"><img src="public/image/product/<?= $values->image ?>" alt="<?= $values->name ?>"></label>
                                    </div>

                                    <?php if ($dem > 2) : ?>
                                        <div class="shoer-list-item"><label for="img2-<?= $img_id ?>"><img src="public/image/product/<?= $list_image[2]->name ?>" alt="<?= $values->name ?>"></label>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>
<div class="container bg-shadow">
    <img class="w-100" height="250px" src="https://bizweb.dktcdn.net/100/366/839/themes/737085/assets/bigbanner.jpg?1664096070518" alt="">
</div>
<style>

</style>
<div class="container mt-5">
    <h2 class="text-center mt-5 my-5 fs-1">PHỤ KIỆN BẠN CÓ THỂ THÍCH</h2>
    <div class="row row-cols-3 row-cols-md-4 g-4">
        <?php foreach ($list_accessory as $value) : ?>
            <div class="col">
                <div class="card mb-3 border-0" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <a href="?option=product&slug=<?=$value->slug?>">
                            <img width="100px" height="100px" src="public/image/product/<?= $value->image ?>" class=" rounded-start" alt="...">
                            </a>
                        </div>
            
                        <div class="col-md-8">
                            <div class="card-body">
                            <a class="link-hover" href="?option=product&slug=<?=$value->slug?>">
                            <h5 class="card-title fs-3 ms-3 text-capitalize"><?= $value->name ?></h5>
                            </a>
                                <h6 class="text-danger fs-3 ms-3"><?= $value->price ?>đ</h6>
                                <?php if ($value->pricesale != 0) : ?>
                                    <h6><del class="text-secondary fs-3 ms-3"><?= $value->pricesale ?></del></h6>
                                <?php endif; ?>
                                <?php if ($value->pricesale != 0) : ?>
                                    <span class="sale-pk"><?= ceil(((($value->pricesale - $value->price) / $value->pricesale) * 100)) ?>%</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <style>

    </style>
    <div class="row">
        <h5 class="my-5 text-center tin-tuc fs-1"><a class="fs-1" href="?option=post">TIN TỨC</a> </h5>
        <?php foreach($list_news as $value): ?>
        <div class="col-md col-6">
            <div class="img-tintuc">
                <a href="?option=post&cat=<?=$value->slug?>">
                <img class="w-100" height="236px" src="public/image/post/<?=$value->image?>" alt="">
                </a>
            </div>
                <h3 class="mt-3"><a class="text-capitalize link-hover" href="?option=post&cat=<?=$value->slug?>"><?=$value->title?></a> </h3>
            <?php $date=date_create($value->created_at);
                ?>
            <p class="m-0 mt-3 p-0 fs-4"><?=date_format($date,"d/m/Y");?></p>
            <p class="fs-4 text-secondary text"><?=$value->slug?>...</p>
        </div>
        <?php endforeach; ?>
    </div>
    <hr>
    <div class="row my-5">
        <div class="col-md">
            <a href="?option=page&cat=chinh-sach-mua-hang"></a>
            <h6 class="fs-3 text-primary"><img class="me-2" src="https://bizweb.dktcdn.net/100/332/764/themes/880395/assets/service_1.png?1665388816899" alt="">
                GIAO HÀNG NHANH</h6>
            <p class="fs-5 mt-3 text-secondary">Tại Hà Nội có nhân viên giao trong ngày. Ngoại tỉnh dùng chuyển phát
                nhanh chỉ từ 1-2 ngày.</p>
        </div>
        <div class="col-md ">
            <h6 class="fs-3  text-primary"><img class="me-2" src="https://bizweb.dktcdn.net/100/332/764/themes/880395/assets/service_2.png?1665388816899" alt="">
                BẢO HÀNH 1 NĂM</h6>
            <p class="fs-5 mt-2 text-secondary">Miễn phí áp dụng cho tất cả các dòng kính đã và đang bán, bao gồm lỗi kí
                thuật do nhà sản xuất</p>
        </div>
        <div class="col-md">
            <h6 class="fs-3  text-primary"><img class="me-2" src="https://bizweb.dktcdn.net/100/332/764/themes/880395/assets/service_3.png?1665388816899" alt="">
                CHÍNH SÁCH ĐỔI TRẢ</h6>
            <p class="fs-5 mt-2 text-secondary">Được đổi hàng trong vòng 7 ngày nếu sản phẩm còn nguyên vẹn. Đổi và chọn
                hàng tại cửa hàng.</p>
        </div>
    </div>



    <div class="image-brand">
        <div class="brand-item">
            <a href="" class="brand-img">
                <img src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/brand6.png?1664213229376" alt="">
            </a>
        </div>
        <div class="brand-item">
            <a href="" class="brand-img">
                <img src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/brand7.png?1664213229376" alt="">
            </a>
        </div>
        <div class="brand-item">
            <a href="" class="brand-img">
                <img src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/brand8.png?1664213229376" alt="">
            </a>
        </div>
        <div class="brand-item">
            <a href="" class="brand-img">
                <img src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/brand1.png?1664213229376" alt="">
            </a>
        </div>
        <div class="brand-item">
            <a href="" class="brand-img">
                <img src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/brand2.png?1664213229376" alt="">
            </a>
        </div>
        <div class="brand-item">
            <a href="" class="brand-img">
                <img src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/brand3.png?1664213229376" alt="">
            </a>
        </div>
        <div class="brand-item">
            <a href="" class="brand-img">
                <img src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/brand4.png?1664213229376" alt="">
            </a>
        </div>
        <div class="brand-item">
            <a href="" class="brand-img">
                <img src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/brand5.png?1664213229376" alt="">
            </a>
        </div>
    </div>
</div>

<?php require_once('views/frontend/footer.php') ?>