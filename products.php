<?php
$title = 'Product';
require_once __DIR__ . "/include/conn.php";
include_once __DIR__ . "/include/helper.php";
include_once __DIR__ . "/controller/Common.php"; 
require_once __DIR__ . "/controller/admin/Product.php";
include_once __DIR__ . "/layout/front/header.php";
include_once __DIR__ . "/layout/front/head.php";

$comm = new Common();
$categories = $comm->getMultipleRecord('category');

$product = new Product();
$Records = $product->getALLProducts();

?>

<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
        
        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
                        <img src="<?= $base_url.'/public/front/images/item-cart-01.jpg'?>" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="javascript:void(0);" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            White Shirt Pleat
                        </a>

                        <span class="header-cart-item-info">
                            1 x $19.00
                        </span>
                    </div>
                </li>

                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
                        <img src="<?= $base_url.'/public/front/images/item-cart-02.jpg'?>" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="javascript:void(0);" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            Converse All Star
                        </a>

                        <span class="header-cart-item-info">
                            1 x $39.00
                        </span>
                    </div>
                </li>

                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
                        <img src="<?= $base_url.'/public/front/images/item-cart-03.jpg'?>" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="javascript:void(0);" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            Nixon Porter Leather
                        </a>

                        <span class="header-cart-item-info">
                            1 x $17.00
                        </span>
                    </div>
                </li>
            </ul>
            
            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Total: $75.00
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>

                    <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Product -->
<section class="bg0 p-t-23 p-b-140 mt-4">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Products
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    All Products
                </button>
                
                <?php if($categories && count($categories) > 0) : ?>
                <?php foreach ($categories as $key => $cate) :  ?>
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?= (isset($cate['slug']) && $cate['slug'] ? $cate['slug'] : ''); ?>">
                    <?= (isset($cate['name']) && $cate['name'] ? $cate['name'] : ''); ?>
                    </button>
                <?php endforeach; ?>
                <?php endif; ?>

                
            </div>

            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>

                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
                </div>	
            </div>

            <!-- Filter -->
            <div class="dis-none panel-filter w-full p-t-10">
                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    <div class="filter-col1 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Sort By
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04">
                                    Default
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04">
                                    Popularity
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04">
                                    Average rating
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04 filter-link-active">
                                    Newness
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04">
                                    Price: Low to High
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04">
                                    Price: High to Low
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col2 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Price
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04 filter-link-active">
                                    All
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04">
                                    $0.00 - $50.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04">
                                    $50.00 - $100.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04">
                                    $100.00 - $150.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04">
                                    $150.00 - $200.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04">
                                    $200.00+
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col3 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Color
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04">
                                    Black
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04 filter-link-active">
                                    Blue
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04">
                                    Grey
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04">
                                    Green
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04">
                                    Red
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
                                    <i class="zmdi zmdi-circle-o"></i>
                                </span>

                                <a href="javascript:void(0);" class="filter-link stext-106 trans-04">
                                    White
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col4 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Tags
                        </div>

                        <div class="flex-w p-t-4 m-r--5">
                            <a href="javascript:void(0);" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Fashion
                            </a>

                            <a href="javascript:void(0);" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Lifestyle
                            </a>

                            <a href="javascript:void(0);" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Denim
                            </a>

                            <a href="javascript:void(0);" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Streetstyle
                            </a>

                            <a href="javascript:void(0);" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Crafts
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row isotope-grid">
            <?php if($Records && count($Records) > 0) : ?>
            <?php foreach ($Records as $key => $val) :  ?>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?= (isset($val['cat_slug']) && $val['cat_slug'] ? $val['cat_slug'] : ''); ?>">
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