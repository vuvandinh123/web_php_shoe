<?php

use App\Models\Menu;

$args_mainmenu = [
        ['parent_id', '=', '0'],
        ['status', '=', '1'],
        ['position', '=', 'footermenu']
];
$lis_menu = Menu::where($args_mainmenu)->orderBy('sort_order', 'asc')->get();

?>


<footer>
    <div class="footer-top">
        <div class="container">
            <h6 class="fs-1 text-center">
                NHẬP MAIL
            </h6>
            <p class="text-center">Để nhận tin tức khuyến mãi từ cửa hàng của chúng tôi</p>
            <form action="">
                <div class="input-group mb-3 input-footer">
                    <input type="text" class="form-control " placeholder="Nhập email của bạn"
                        aria-label="Nhập email của bạn" aria-describedby="basic-addon2">
                    <button class="btn btn-outline-secondary bg-danger text-white" type="button" id="button-addon2">GỬI
                        NGAY</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container p-5">
        <div class="row">
            <div class="col-md col-6">
                <h6 class="fs-2 fw-bold mb-3">Hệ thống của hàng</h6>
                <p class=" fs-4 fw-bold">Sea Shoes Hồ Chí Minh</p>
                <p class=" fs-4 text-secondary">Địa chỉ: 366 Đội Cấn Ba Đình Hồ Chí Minh</p>
                <p class=" fs-4 text-secondary">Hotline: 0333583800</p>
                <p class=" fs-4 fw-bold">Sea Shoes Hồ Chí Minh</p>
                <p class=" fs-4 text-secondary">Địa chỉ: 366 Đội Cấn Ba Đình Hồ Chí Minh</p>
                <p class=" fs-4 text-secondary">Hotline: 0333583800</p>
            </div>
            <?php foreach($lis_menu as $value):?>
                <?php 
                    $args_mainmenu2 = [
                        ['parent_id', '=', $value->id],
                        ['status', '=', '1'],
                        ['position', '=', 'footermenu']
                ];
                $lis_menu2 = Menu::where($args_mainmenu2)->orderBy('sort_order', 'asc')->get();
                    
                    ?>
            <div class="col-md">
                
                <ul><h6 class="fs-3  mb-4"><?=$value->name?></h6>
                    <?php foreach ($lis_menu2 as $value2):?>
                    <a class="a-hover" href="<?=$value2->link?>"> <li class='mb-4 text-secondary fs-4'><?=$value2->name?></li></a>
                    <?php endforeach;?>
                </ul>
            </div>
            <?php endforeach;?>
            <div class="col-md col-6">
                <h6 class="fs-3 ms-4 mb-4">Đăng ký</h6>
                <div class="icon-img-footer">
                    <img src="https://bizweb.dktcdn.net/100/369/492/themes/799053/assets/bocongthuong.png?1664335617141"
                        alt="">
                </div>
                <h6 class="fs-3 ms-4 my-4 ">Thanh toán</h6>

                <div class="icon-img-footer ms-4">
                    <img src="https://bizweb.dktcdn.net/100/369/492/themes/799053/assets/payment.png?1664335617141"
                        alt="">
                </div>


            </div>
        </div>
    </div>
    <div class="footer-bot bg-dark">
        <h4 class="text-white">
            © Bản quyền thuộc về <span class="text-danger"> Định</span> | Cung cấp bởi Định
        </h4>
    </div>
</footer>
<div class="backto-top" onclick="backToTop()">
    <a class="text-white" ><i class="fa-solid fa-chevron-up fa-2xl fs-3 fw-bold"></i></a>
</div>
</body>
<script src="public/js/index.js"></script>

<link
    rel="stylesheet"
    type="text/css"
    href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  
</html>

<script
  type="text/javascript"
  src="https://code.jquery.com/jquery-1.11.0.min.js"
></script>
<script
  type="text/javascript"
  src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
></script>
<script
  type="text/javascript"
  src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
></script>

<script src="public/js/index.js"></script>


<!-- <a href="https://dribbble.com/shots/3306190-Login-Registration-form" target="_blank" class="icon-link">
  <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/256/Dribbble-icon.png">
</a>
<a href="https://twitter.com/NikolayTalanov" target="_blank" class="icon-link icon-link--twitter">
  <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png">
</a> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>


