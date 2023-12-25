<style>
    .profile_header {
        position: relative;
    }

    .anhbia {
        width: 100%;
        height: 250px;
        border-radius: 0 0 20px 20px;
        overflow: hidden;
        position: relative;
    }

    .daidien {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        position: absolute;
        top: 190px;
        left: 100px;
        border: 5px solid #fff;
    }

    .profile_header h3 {

        margin: 30px 0 30px 280px;
        font-size: 30px;
        font-weight: bold;
    }

    .upload {
        width: 200px;
        position: absolute;
        right: 0;
        bottom: 0;
    }
    .upload2 {
        width: 110px;
        position: absolute;
        left: 10px;
        bottom: 30px;
    }
    /* .daidien form{
        display: none;
    }
    .daidien:hover form{
        display: block;
    } */
</style>


<?php 

use App\Libraries\Upload;
use App\Models\User;


$img = '' ?? 'puma.webp';
$user = User::find($_SESSION['user_id']);
$error = '';

if (isset($_POST['them'])||isset($_POST['them2'])) {

    $args = array(
        'path_dir' => 'public/image/icon/',
        'file' => $_FILES['fileToUpload']??$_FILES['fileToUpload2'],
        'extention' => ['png', 'jpg', 'webp'],
        'maxsize' => 500000
    );
    $upload = Upload::saveFile($args);
    if ($upload['success'] == true) {

        if (isset($_POST['them'])) {
            $user->cover_image = $upload['result'];
            $user->save();
            $_SESSION['cover_image'] = $user->cover_image;
        }
        else
        {
            $user->image = $upload['result'];
            $user->save();
            $_SESSION['image'] = $user->image;
        }
    }
}

?>
<?php
                // if (isset($_POST['them5']))
                //     for ($i = 0; $i < count($all_files); $i++) {
                //         $image_name = $all_files[$i];
                //         $supported_format = array('gif', 'jpg', 'jpeg', 'png', 'webp');
                //         $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
                //         if ($_POST['img'] == $i) {
                //             $image = $image_name;
                //         }
                //     }
                // echo $image ?? '';
                // ?>

<?php require_once('views/frontend/header.php');?>
<div class="container">
    <div class="profile_header">
        <div class="anhbia">
            <img width="100%" height=250px src="public/image/banner/<?=$_SESSION['cover_image']?>" alt="">
            <form class="upload" action="" method="post" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <input name="fileToUpload" type="file" class="form-control" id="inputGroupFile02">

                    <button name="them" type="submit" class="input-group-text bg-danger text-white" for="inputGroupFile02">Đổi ảnh bìa</button>

                </div>
            </form>
        </div>
        <div class="daidien">
            <img  width="100%" height="100%" src="public/image/icon/<?=$_SESSION['image']?>" alt=""  data-bs-toggle="dropdown" aria-expanded="false">
            <div class="dropdown-menu">
            <form  class="upload2 " action="" method="post" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <input name="fileToUpload2" type="file" class="form-control w-20" id="inputGroupFile02">
                    <button name="them2" type="submit" class="input-group-text bg-danger text-white" for="inputGroupFile02">xác nhận</button>

                </div>
            </form>
            </div>

        </div>

        <h3 class=""><?=$_SESSION['name']?></h3>

    </div>

    <div class="profile_body row">
        <div class="gioithieu col-4 border rounded-4 ">
            <h4 class="my-3 fs-3"><i class="fa-solid fa-user"></i> Thông tin cá nhân</h4>
            <p class="mb-3 my-5 fs-4"><strong> Email: </strong><?=$_SESSION['email']?></p>
            <p class="my-3 fs-4"><strong>Địa chỉ:</strong>  <?=$_SESSION['address']?></p>
            <p class="my-3 fs-4"><strong>Số điện thoại:</strong>  <?=$_SESSION['phone']?></p>
            <p class="my-3 fs-4"><strong>Ngày tham gia: </strong>  <?=$_SESSION['created_at'] ?></p>
        </div>
        <div class="col-8 border rounded-4">
            <h4 class="my-3"><i class="fa-solid fa-cart-shopping"></i> Gio hàng</h4>
            <div class="card mb-3 " style="">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="http://localhost/BaoCaoThucTap_LTW_Vu_Van_Dinh/public/images/AdidasWhiteStanSmith2.webp" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Nike Men Charcoal Grey</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            <div class="mua d-flex justify-content-between">
                                <button class="btn btn-danger w-50 h-50">MUA</button>
                                <a class="text-right" href="#">Xem chi tiết!</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <h4 class="my-3 text-danger"><i class="fa-solid fa-heart me-3"></i>Đã thích</h4>
            <div class="card mb-3 " style="">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="http://localhost/BaoCaoThucTap_LTW_Vu_Van_Dinh/public/images/AdidasWhiteStanSmith2.webp" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Nike Men Charcoal Grey</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            <div class="mua d-flex justify-content-between">
                                <button class="btn btn-danger w-50 h-50">MUA</button>
                                <a class="text-right" href="#">Xem chi tiết!</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once('views/frontend/footer.php');
?>

<?php


  
 ?>