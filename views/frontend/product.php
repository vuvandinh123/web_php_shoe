<?php require_once('views/frontend/header.php'); ?>

<?php
use App\Models\Category;
use App\Models\brand;
use App\Models\product;
use App\Models\Menu;
use App\Models\Image;
use App\Libraries\Pagination;

$ten = 'TẤT CẢ SẢN PHẨM';
$brand = $_REQUEST['brand']??NULL;
$page = $_REQUEST['page']??NULL;
$price = $_REQUEST['price']??NULL;
$category = $_REQUEST['category']??NULL;
$sort = $_REQUEST['sort']??NULL;
$query = 'option=product';
$uri = $_SERVER['REQUEST_URI']; $_SESSION['url']=$uri;
$url = '';
if(isset($brand))
{
        $url = '&brand=' . $brand;
}
elseif(isset($category))
{
        $url = '&category=' . $category;
}
elseif(isset($price))
{
       $url = '&price='. $price ;
    
}


$list_category = Category::where('status', '!=', 0)->get();
$list_product = Product::where('status', '=', 1)->get();
$list_brand = Brand::where('status', '=', 1)->get();
$list_menu = Menu::where([['status', '!=', 0],['parent_id','=',0]])->get();


$brand = Brand::where([['status', '=', 1],['slug','=',$brand]])->first();

$category=Category::where([['status', '=', 1],['slug','=',$category]])->first();

$br = $brand == NULL ? 0 : $brand->id;
$ct = $category == NULL ? 0 : $category->id;
   
$all=Product::where('status', '=',1)->count();

$j = $_REQUEST['page'] ?? '';

$option = $_REQUEST['option'] ?? '';

                $pageNumber = $_REQUEST['page'] ?? 1 ;
                $hienthi = 22;
                $linkhienthi = ($pageNumber - 1) * $hienthi;
                $number_of_page=ceil($all/$hienthi);
                $key = '';
                if(!empty($_REQUEST['s']) )
                {
                    $ten = 'TÌM KIẾM';
                    $key = $_REQUEST['s'];
                    $list_product = Product::where('status', 1)->where('name','like',"%".$key.'%')->get();
                
                } 
                else {
                    if(isset($_REQUEST['brand']))
                    {
        $ten = $brand->name;
                        if(isset($sort)&&($sort=='desc'||$sort=='asc'))
                        {
                                    $list_product = Product::where([['status', '=', 1],['brand_id','=',$brand->id]])
                                    ->skip($linkhienthi)
                                    ->take($hienthi)
                                    ->orderBy('created_at', $sort)->get();
                            
                        }
                        elseif(isset($sort)&&($sort=='priceDesc'||$sort=='priceAsc'))
                        {
                                $kt = $sort == 'priceDesc' ? 'desc' : 'asc';
                                $list_product = Product::where([['status', '=', 1],['brand_id','=',$brand->id]])
                                ->skip($linkhienthi)
                                ->take($hienthi)
                                ->orderBy('price', $kt)->get();
                        }
                        else{
                                $list_product = Product::where([['status', '=', 1],['brand_id','=',$brand->id]])
                                ->skip($linkhienthi)
                                ->take($hienthi)
                                ->get();
                        }
                        if(isset($_REQUEST['price']))
                        {

                                if(isset($price)&&($price=='200'))
                                {  
                                $list_product = Product::where([['status', '=', 1],['brand_id','=',$brand->id],['price','<=',200000]])
                                            ->skip($linkhienthi)
                                            ->take($hienthi)
                                            ->get();
                                }
                                if(isset($price)&&($price=='400'))
                                {  
                                $list_product = Product::where([['status', '=', 1],['brand_id','=',$brand->id],['price','>=',200000],['price','<=',500000]])
                                            ->skip($linkhienthi)
                                            ->take($hienthi)
                                            ->get();
                                }
                                if(isset($price)&&($price=='600'))
                                {  
                                $list_product = Product::where([['status', '=', 1],['brand_id','=',$brand->id],['price','>=',500000],['price','<=',1000000]])
                                            ->skip($linkhienthi)
                                            ->take($hienthi)
                                            ->get();
                                }
                                if(isset($price)&&($price=='1000'))
                                {  
                                $list_product = Product::where([['status', '=', 1],['brand_id','=',$brand->id],['price','>',1000000]])
                                            ->skip($linkhienthi)
                                            ->take($hienthi)
                                            ->get();
                                }
                                
                    }

                    } elseif (isset($_REQUEST['category'])) {
                        $ten = $category->name;
        if (isset($sort) && ($sort == 'desc' || $sort == 'asc')) {
            $list_product = Product::where([['status', '=', 1], ['category_id', '=', $category->id]])
                ->skip($linkhienthi)
                ->take($hienthi)
                ->orderBy('created_at', $sort)->get();

        } elseif (isset($sort) && ($sort == 'priceDesc' || $sort == 'priceAsc')) {
            $kt = $sort == 'priceDesc' ? 'desc' : 'asc';
            $list_product = Product::where([['status', '=', 1], ['category_id', '=', $category->id]])
                ->skip($linkhienthi)
                ->take($hienthi)
                ->orderBy('price', $kt)->get();
        } else {
            $list_product = Product::where([['status', '=', 1], ['category_id', '=', $category->id]])
                ->skip($linkhienthi)
                ->take($hienthi)
                ->get();
        }
        if (isset($_REQUEST['price'])) {

            if (isset($price) && ($price == '200')) {
                $list_product = Product::where([['status', '=', 1], ['category_id', '=', $category->id], ['price', '<=', 200000]])
                    ->skip($linkhienthi)
                    ->take($hienthi)
                    ->get();
            }
            if (isset($price) && ($price == '400')) {
                $list_product = Product::where([['status', '=', 1], ['category_id', '=', $category->id], ['price', '>=', 200000], ['price', '<=', 500000]])
                    ->skip($linkhienthi)
                    ->take($hienthi)
                    ->get();
            }
            if (isset($price) && ($price == '600')) {
                $list_product = Product::where([['status', '=', 1], ['category_id', '=', $category->id], ['price', '>=', 500000], ['price', '<=', 1000000]])
                    ->skip($linkhienthi)
                    ->take($hienthi)
                    ->get();
            }
            if (isset($price) && ($price == '1000')) {
                $list_product = Product::where([['status', '=', 1], ['category_id', '=', $category->id], ['price', '>', 1000000]])
                    ->skip($linkhienthi)
                    ->take($hienthi)
                    ->get();
            }
        }
    }
    else{
        if(isset($sort)&&($sort=='desc'||$sort=='asc'))
        {
                    $list_product = Product::where('status', '=', 1)
                    ->skip($linkhienthi)
                    ->take($hienthi)
                    ->orderBy('created_at', $sort)->get();
            
        }
        elseif(isset($sort)&&($sort=='priceDesc'||$sort=='priceAsc'))
        {
                $kt = $sort == 'priceDesc' ? 'desc' : 'asc';
                $list_product = Product::where('status', '=', 1)
                ->skip($linkhienthi)
                ->take($hienthi)
                ->orderBy('price', $kt)->get();
        }
        else{
                $list_product = Product::where('status', '=', 1)
                ->skip($linkhienthi)
                ->take($hienthi)
                ->get();
        }
        if(isset($_REQUEST['price']))
        {

                if(isset($price)&&($price=='200'))
                {  
                $list_product = Product::where([['status', '=', 1],['price','<=',200000]])
                            ->skip($linkhienthi)
                            ->take($hienthi)
                            ->get();
                }
                if(isset($price)&&($price=='400'))
                {  
                $list_product = Product::where([['status', '=', 1],['price','>=',200000],['price','<=',500000]])
                            ->skip($linkhienthi)
                            ->take($hienthi)
                            ->get();
                }
                if(isset($price)&&($price=='600'))
                {  
                $list_product = Product::where([['status', '=', 1],['price','>=',500000],['price','<=',1000000]])
                            ->skip($linkhienthi)
                            ->take($hienthi)
                            ->get();
                }
                if(isset($price)&&($price=='1000'))
                {  
                $list_product = Product::where([['status', '=', 1],['price','>',1000000]])
                            ->skip($linkhienthi)
                            ->take($hienthi)
                            ->get();
                }
                
    }

    
    }
                    
}

 ?>
<?php
$kt = count($list_product);



?>
<style>
.bg_collection {
    margin-top: 100px;

}

.hover {
    color: black;

}

.hover:hover {
    color: red;
}

.form-check-input[type=checkbox] {
    border-radius: unset;
}

.hover:hover input {
    color: red;
    border: 1px solid red;
    outline: none;
    border-radius: unset;
}

.hover input {
    background-color: white;
    border-radius: unset;

}

.hover input:checked {
    background-color: red;
    border-radius: unset;
}

.over_flow {
    overflow-y: scroll;
    max-height: 200px;
}

.over_flow::-webkit-scrollbar {
    width: 5px;
}

.over_flow::-webkit-scrollbar-track {
    background-color: rgb(145, 154, 168);
}

.over_flow::-webkit-scrollbar-thumb {
    box-shadow: inset 0 0 10px rgba(237, 28, 36, 1);
}

.product {
    margin-top: 95px;
}
</style>
<div class="container my-5">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item fs-5"><a class="hover" href="index.php">Trang chủ</a></li>
            <li class="breadcrumb-item active text-lowercase fs-5" aria-current="page"><?=$ten?></li>

        </ol>

    </nav>

    <section class="row ">
        <div class="bg_collection col-md-3">

            <div class="category ">
                <p class="my-4"><strong class="fs-4"> DANH MỤC SẢN PHẨM</strong></p>
                <div class="border over_flow">
                    <ul class="fs-5">
                        <?php foreach($list_menu as $value): ?>
                        <a class="hover" href="<?=$value->link?>">
                            <li class="py-2 d-flex p-2 justify-content-between"> <span
                                    class="text-capitalize"><?=$value->name?></span> <span><i
                                        class="fs-6 fa-solid fa-chevron-right"></i></span>
                            </li>
                        </a>
                        <?php endforeach;?>
                    </ul>
                </div>

            </div>
            <div class="brand mt-4">
                <p class="my-4"><strong class="fs-4">Thương hiệu</strong></p>
                <div class="border over_flow">
                    <?php foreach($list_brand as $value): ?>
                    <div class="form-check ms-4 py-3 hover">
                        <a class="fs-5 hover w-100 d-block" href="?option=product&brand=<?=$value->slug?>">

                            <?php if($value->id==$br): ?>
                            <i class="fa-solid fa-square-check fs-5 text-danger me-2"></i>
                            <?php else: ?>
                            <i style="color: rgba(9,9,9,0.1);" class="fa-regular fa-square fs-5  me-2"></i>
                            <?php endif; ?>
                            <?=$value->name?>
                        </a>
                    </div>
                    <?php endforeach;?>

                </div>
            </div>
            <div class="price  mt-4">
                <p class="my-4"><strong class="fs-4">Mức giá</strong></p>
                <div class="border over_flow">
                    <div class="form-check ms-4 py-3 hover">
                        <a class="fs-5 hover w-100 d-block" href="?option=product<?=$url?>&price=200&page=1">
                            <?php if($price=='200'): ?>
                            <i class="fa-solid fa-square-check fs-5 text-danger me-2"></i>
                            <?php else: ?>
                            <i style="color: rgba(9,9,9,0.1);" class="fa-regular fa-square fs-5  me-2"></i>
                            <?php endif; ?>
                            Dưới 200.000đ

                        </a>
                    </div>
                    <div class="form-check ms-4 py-3 hover">
                        <a class="fs-5 hover w-100 d-block" href="?option=product<?=$url?>&price=400&page=1">
                            <?php if($price=='400'): ?>
                            <i class="fa-solid fa-square-check fs-5 text-danger me-2"></i>
                            <?php else: ?>
                            <i style="color: rgba(9,9,9,0.1);" class="fa-regular fa-square fs-5  me-2"></i>
                            <?php endif; ?>

                            200.000đ-500.000đ
                        </a>

                    </div>
                    <div class="form-check ms-4 py-3 hover">
                        <a class="fs-5 hover w-100 d-block" href="?option=product<?=$url?>&price=600&page=1">
                            <?php if($price=='600'): ?>
                            <i class="fa-solid fa-square-check fs-5 text-danger me-2"></i>
                            <?php else: ?>
                            <i style="color: rgba(9,9,9,0.1);" class="fa-regular fa-square fs-5  me-2"></i>
                            <?php endif; ?>

                            500.000đ-1.000.000đ
                        </a>
                    </div>
                    <div class="form-check ms-4 py-3 hover">
                        <a class="fs-5 hover w-100 d-block" href="?option=product<?=$url?>&price=1000&page=1">
                            <?php if($price=='1000'): ?>
                            <i class="fa-solid fa-square-check fs-5 text-danger me-2"></i>
                            <?php else: ?>
                            <i style="color: rgba(9,9,9,0.1);" class="fa-regular fa-square fs-5  me-2"></i>
                            <?php endif; ?>

                            Giá Trên 1.000.000đ
                        </a>
                    </div>
                </div>
            </div>
            <div class="pro mt-4 ">
                <p class="my-4"><strong class="fs-4">Loại sản phẩm</strong></p>
                <div class="border over_flow">
                    <?php foreach($list_category as $value): ?>
                    <div class="form-check ms-4 py-3 hover">
                        <a class="fs-5 hover w-100 d-block" href="?option=product&category=<?=$value->slug?>&page=1">
                            <?php if($value->id==$ct): ?>
                            <i class="fa-solid fa-square-check fs-5 text-danger me-2"></i>
                            <?php else: ?>
                            <i style="color: rgba(9,9,9,0.1);" class="fa-regular fa-square fs-5  me-2"></i>
                            <?php endif; ?>

                            <?=$value->name?>
                        </a>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
       
    
        <div class="conten col-md-9">
        
            <h1 class="text-center mt-5 fw-bold hover text-uppercase"><?=$ten?></h1>

            <div class="product">
            <?php 
        if(!empty($_REQUEST['s']) ):?>

            <div class="search">
                <p>Kết quả tìm kiếm cho : <?=$_REQUEST['s'];?> </p>
            </div>

            <?php endif; ?>
            <?php
            
            
            ?>
                <div class="d-flex justify-content-between mb-3">
                    <div class="d-flex">
                        <label class="fs-4" for=""><strong>Sắp xếp:</strong> </label>
                        <div class="form-check mx-3 fs-4">
                            <?php
                                if($sort=='desc'):?>
                            <a href="?option=product<?=$url?>&sort=desc&page=1">
                                <i class="fa-solid fa-square-check fs-5 text-danger me-2"></i> Mới nhất
                            </a>
                            <?php else:?>
                            <a href="?option=product<?=$url?>&sort=desc&page=1">
                                <i style="color: rgba(9,9,9,0.1);" class="fa-regular fa-square fs-5  me-2"></i> Mới nhất
                            </a>
                            <?php endif;?>
                        </div>
                        <div class="form-check mx-3 fs-4">

                            <?php
                                if($sort=='asc'):?>
                            <a href="?option=product<?=$url?>&sort=asc&page=1">
                                <i class="fa-solid fa-square-check fs-5 text-danger me-2"></i> Cũ nhất
                            </a>
                            <?php else:?>
                            <a href="?option=product<?=$url?>&sort=asc&page=1">
                                <i style="color: rgba(9,9,9,0.1);" class="fa-regular fa-square fs-5  me-2"></i> Cũ nhất
                            </a>
                            <?php endif;?>

                        </div>
                        <div class="form-check mx-3 fs-4">

                            <?php
                                if($sort=='priceAsc'):?>
                            <a href="?option=product<?=$url?>&sort=priceAsc&page=1">
                                <i class="fa-solid fa-square-check fs-5 text-danger me-2"></i> Giá tăng dần
                            </a>
                            <?php else:?>
                            <a href="?option=product<?=$url?>&sort=priceAsc&page=1">
                                <i style="color: rgba(9,9,9,0.1);" class="fa-regular fa-square fs-5  me-2"></i> Giá tăng
                                dần
                            </a>
                            <?php endif;?>
                        </div>
                        <div class="form-check mx-3 fs-4">
                            <?php
                                if($sort=='priceDesc'):?>
                            <a href="?option=product<?=$url?>&sort=priceDesc&page=1">
                                <i class="fa-solid fa-square-check fs-5 text-danger me-2"></i> Mới nhất
                            </a>
                            <?php else:?>
                            <a href="?option=product<?=$url?>&sort=priceDesc&page=1">
                                <i style="color: rgba(9,9,9,0.1);" class="fa-regular fa-square fs-5  me-2"></i> Mới nhất
                            </a>
                            <?php endif;?>

                        </div>
                    </div>

                </div>
                <?php if($kt!=0):?>
                <div class="row row-cols-2 row-cols-md-4 g-4">
                    <?php foreach ($list_product as  $values) : ?>
                    <?php $list_image = Image::join('product', 'product.id', '=', 'image.id_product')->where([['product.status', '!=', '0'], ['image.id_product', '=', $values->id]])
            ->select("image.*")->get();
        $dem = count($list_image);
        // echo $dem;
?>

                    <div class="col ">
                        <div class="card h-100 border border-0">
                            <?php if ($values->pricesale != 0) : ?>
                            <span
                                class="sale"><?=ceil(((($values->pricesale-$values->price)/$values->pricesale)*100)) ?>%</span>
                            <?php endif; ?>
                            <a class="position-relative" href="?option=product&slug=<?=$values->slug?>">
                                <input type="radio" name="img-<?= ++$img_id ?>" id="img1-<?= $img_id ?>" checked>
                                <div class="<?php if($dem>=1) echo 'card-hover'?>" title="<?= $values->name ?>">
                                    <img src="public/image/product/<?= $values->image ?>" class="card-img-top card-item"
                                        alt="<?= $values->name ?>">
                                    <?php if($dem>0):?>
                                    <img src="public/image/product/<?= $list_image[0]->name ?>"
                                        class="card-img-top card-item" alt="<?= $values->name ?>">
                                    <?php endif;?>
                                </div>
                                <?php if($dem>3):?>
                                <input type="radio" name="img-<?=$img_id?>" id="img2-<?=$img_id?>">
                                <div class="card-hover" title="Nike Blazer x sacai x KAWS">
                                    <img src="public/image/product/<?=$list_image[1]->name?>?>"
                                        class="card-img-top card-item" alt="Nike Blazer x sacai x KAWS">
                                    <img src="public/image/product/<?=$list_image[2]->name?>"
                                        class="card-img-top card-item" alt="Nike Blazer x sacai x KAWS">
                                </div>
                                <?php endif;?>
                                <?php if($values->type==1): ?>
                                <div class="size fs-6">
                                <span class="size-item">39</span><span class="size-item"></span><span
                                    class="size-item">40</span><span class="size-item">41</span><span
                                    class="size-item">+2</span>
                                </div>
                                <?php endif;?>
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
                                                src="public/image/product/<?= $values->image ?>"
                                                alt="<?= $values->name ?>"></label>
                                    </div>

                                    <?php if($dem>=3):?>
                                    <div class="shoer-list-item"><label for="img2-<?= $img_id ?>"><img
                                                src="public/image/product/<?= $list_image[2]->name ?>"
                                                alt="<?= $values->name ?>"></label>
                                    </div>
                                    <?php endif;?>

                                </div>
                            </div>

                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <?php if(isset($_REQUEST['s'])): ?>
                            <div class="alert alert-secondary" role="alert">
                        Không tìm thấy nội dung yêu cầu !
                    </div>
                           <?php else: ?> 
                    <div class="alert alert-secondary" role="alert">
                        Sản phẩm chưa được cập nhật
                    </div>
                    <?php endif;?>
                    <?php endif; ?>
                    <?php 
                                   
                                  
                                   ?>
                </div>
                <div class=" d-flex justify-content-center">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item">
                                <span class="page-link"><a href="?option=product<?=$url?>&page=1">Đầu</a></span>
                            </li>
                            <?php for($i=1;$i<=$number_of_page;$i++): ?>
                            <li class="page-item"> <a
                                    class=' page-link text-dark fw-bold <?php if($j==$i)echo 'bg-primary' ?>'
                                    href='?option=product<?=$url?>&page=<?=$i?>'><?=$i?></a></li>
                            <?php endfor; ?>
                            <li class="page-item">

                                <a class="page-link" href="?option=product<?=$url?>&page=<?=--$i?>">Cuối</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

</div>

</section>
</div>
<div style="clear: both;"></div>
<?php require_once('views/frontend/footer.php'); ?>