
<?php

use App\Models\Category;

?><?php require_once("../views/backend/header.php") ?>
<div class="content-wrapper" style="min-height: 365px;">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Trang chủ</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="../index.php">Trang chủ</a></li>
						<li class="breadcrumb-item active">Admin</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?=$allproduct?></h3>

							<h4>SẢN PHẨM</h4>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="?option=product" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?=$allpost?><sup style="font-size: 20px"></sup></h3>

							<h4>BÀI VIẾT</h4>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="?option=post" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3><?=$alluser?></h3>

							<h4 style="color: #fff">THÀNH VIÊN</h4>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="?option=user" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3><?=$allorder?></h3>

							<h4>ĐƠN HÀNG</h4>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						<a href="?option=order" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
			</div>
		</div>
	</section>
</div>
<?php require_once("../views/backend/footer.php") ?>