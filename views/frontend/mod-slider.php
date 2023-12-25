<?php use App\Models\Slider;

$slider = Slider::where('status', '=', 1)->orderBy('sort_order','asc')->get();

$i = 0;
?>

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
 
  <div class="carousel-inner">
  <?php foreach ($slider as $value):?>
    <div class="carousel-item <?php if($i==0) echo "active"; $i++?>" data-bs-interval="10000">
      <img src="public/image/slide/<?=$value->image?>" class="d-block w-100" alt="<?=$value->name?>">
    </div>
    <?php endforeach;?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
