<?php 
    use App\Models\Banner;
            $list_banner= Banner::where('status','=','1')->orderBy('sort_order', 'asc')->get();

?>
<div class="container mb-5">
    <div class="row ">
        <div class="col-md-8 ">
            <div class=" banner p-0 mt-4">
                <img class=" transform-scale"
                    src="public/image/banner/<?=$list_banner[0]->image?>"
                    alt="banner"> </div>
            <div class="banner-title position-relative">
                <div class="title2">
                    <h2 class="banner-title-item"><a class="a-hover-white" href="<?=$list_banner[0]->link?>"><?=$list_banner[0]->title?></a></h2>
                    <p class="sp-hover">8&nbsp;Sản phẩm</p>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class=" banner p-0 mt-4"><img class=" transform-scale"
                    src="public/image/banner/<?=$list_banner[1]->image?>"
                    alt="banner"> </div>
            <div class="banner-title position-relative">
                <div class="title2">
                    <h2 class="banner-title-item"><a class="a-hover-white" href="<?=$list_banner[1]->link?>"><?=$list_banner[1]->title?></a></h2>
                    <p class="sp-hover">8&nbsp;Sản phẩm</p>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class=" banner p-0 mt-4"><img class=" transform-scale"
                    src="public/image/banner/<?=$list_banner[2]->image?>"
                    alt="banner"> </div>
            <div class="banner-title position-relative">
                <div class="title2">
                    <h2 class="banner-title-item"><a class="a-hover-white" href="<?=$list_banner[2]->link?>"><?=$list_banner[2]->title?></a></h2>
                    <p class="sp-hover">8&nbsp;Sản phẩm</p>
                </div>

            </div>
        </div>
        <div class="col-md">
            <div class=" banner p-0 mt-4"><img class=" transform-scale"
                    src="public/image/banner/<?=$list_banner[3]->image?>"
                    alt="banner"> </div>
            <div class="banner-title position-relative">
                <div class="title2">
                    <h2 class="banner-title-item"><a class="a-hover-white" href="<?=$list_banner[3]->link?>"><?=$list_banner[3]->title?></a></h2>
                    <p class="sp-hover">8&nbsp;Sản phẩm</p>
                </div>

            </div>
        </div>
        <div class="col-md">
            <div class=" banner p-0 mt-4"><img class=" transform-scale"
                    src="public/image/banner/<?=$list_banner[4]->image?>"
                    alt="banner"> </div>
            <div class="banner-title position-relative">
                <div class="title2">
                    <h2 class="banner-title-item"><a class="a-hover-white" href="<?=$list_banner[4]->link?>"><?=$list_banner[4]->title?></a></h2>
                    <p class="sp-hover">8&nbsp;Sản phẩm</p>
                </div>

            </div>
        </div>
    </div>
</div>