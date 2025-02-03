<?php
$title = 'Home';
require_once __DIR__ . "/include/conn.php";
include_once __DIR__ . "/include/helper.php";
require_once __DIR__ . "/controller/admin/Product.php";

include_once __DIR__ . "/layout/front/header.php";
include_once __DIR__ . "/layout/front/head.php";

$product = new Product();
$Records = $product->getALLProducts();
// echo "<pre>"; print_r($Records); exit("CALL");
?>

	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(<?= $base_url.'./public/front/images/slide-002.jpg'?>);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<!-- <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Women Collection 2018
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									NEW SEASON
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div> -->
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(<?= $base_url.'./public/front/images/slide-003.jpg'?>);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<!-- <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men New-Season
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Jackets & Coats
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div> -->
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(<?= $base_url.'./public/front/images/slider-004.jpg'?>);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<!-- <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men Collection 2018
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									New arrivals
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div> -->
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(<?= $base_url.'./public/front/images/slide-001.jpg'?>);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<!-- <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men Collection 2018
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									New arrivals
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140 mt-5">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					ALL PRODUCTS 
				</h3>
			</div>

			<div class="row isotope-grid  mt-3">
				<?php if($Records && count($Records) > 0) : ?>
				<?php foreach ($Records as $key => $val) : 
					// $val['specifications']	= json_decode($val['specifications'],true); 
					// echo "<pre>"; print_r(); exit("CALL");
				?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?= (isset($val['image']) && $val['image'] ? getLocalFileUrl($val['image'],'products') : $base_url.'/public/app-assets/images/no-image.png') ?>" alt="IMG-PRODUCT" style="height:270px; width:auto;">

							<a href="javascript:void(0);" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-id="<?= (isset($val['id']) && $val['id'] ? $val['id'] : '') ?>">
								View Details
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="javascript:void(0);" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?= (isset($val['name']) && $val['name'] ? $val['name'] : '') ?>
								</a>

								<span class="cl3 h5">
								Price : ₹<?= $val['price'] ?? 0; ?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="javascript:void(0);" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" data-quentity="1" data-id="<?= (isset($val['id']) && $val['id'] ? $val['id'] : '') ?>" >
								 	<?php 
										$iscart = isCart($val['id']);
									?>
									<img class="icon-cart-2-<?= $val['id'] ?> dis-block trans-04 ab-t-l <?= ($iscart == 1 ? '' : 'd-none'); ?>" src="<?= $base_url.'/public/front/images/icons/icon-heart-02.png'?>" alt="ICON">
									<img class="icon-cart-1-<?= $val['id'] ?> dis-block trans-04 <?= ($iscart == 1 ? 'd-none' : ''); ?>" src="<?= $base_url.'/public/front/images/icons/icon-heart-01.png'?>" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
					<?php //echo "<pre>"; print_r($val); exit("CALL"); ?>
				<?php endforeach; ?>
				<?php endif; ?>
				 
			</div>

			<!-- Load more -->
			<!-- <div class="flex-c-m flex-w w-full p-t-45">
				<a href="javascript:void(0);" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div> -->
		</div>
	</section>


<?php

include_once __DIR__ . "/layout/front/footer.php";

?>