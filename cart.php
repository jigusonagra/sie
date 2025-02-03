<?php
$title = 'Cart';
require_once __DIR__ . "/include/conn.php";
include_once __DIR__ . "/include/helper.php";
include_once __DIR__ . "/controller/Common.php";

include_once __DIR__ . "/layout/front/header.php";
include_once __DIR__ . "/layout/front/head.php";

$is_login = 'false';
if(isset($_SESSION['web'])){ 
    $is_login = 'true';
}
$user_id = $_SESSION['web']['user_id'];
$where = ['user_id' => $user_id];
$common = new Common();
$data = $common->getMultipleRecord('cart',$where);
if($data){
    foreach ($data as $key => $value) {
        $data[$key]['product_details'] = $common->getProductDetails($value['product_id']);
    }
}
?>
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url(<?= $base_url.'/public/front/images/bg-03.jpg'?>);">
    <h2 class="ltext-105 cl0 txt-center">
        View Cart
    </h2>
</section>	

<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
<div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-10 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tbody>
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2">Name</th>
                                    <th class="column-3 text-center">Price</th>
                                    <th class="column-4 text-center">Quantity</th>
                                    <th class="column-5">Total</th>
                                </tr>
                                <?php if($data && count($data) > 0) : ?>
                                    <?php foreach ($data as $key => $value) : ?>
                                        <tr class="table_row">
                                            <td class="column-1">
                                                <div class="how-itemcart1">
                                                    <img src="<?= (isset($value['product_details']['product_images']) && $value['product_details']['product_images'] ? $value['product_details']['product_images'][0]['img_url'] : ''); ?>" alt="IMG">
                                                </div>
                                            </td>
                                            <td class="column-2"><?= (isset($value['product_details']['name']) && $value['product_details']['name'] ? $value['product_details']['name'] : ''); ?></td>
                                            <td class="column-3 text-center">₹ <?= (isset($value['product_details']['price']) && $value['product_details']['price'] ? $value['product_details']['price'] : ''); ?></td>
                                            <td class="column-4 text-center"><?= $value['quantity'] ?? 1 ?></td>
                                            <td class="column-5 item-price" data-price="<?= (isset($value['product_details']['price']) && $value['product_details']['price'] ? $value['product_details']['price'] * $value['quantity'] ?? 1 : ''); ?>"> ₹ <?= (isset($value['product_details']['price']) && $value['product_details']['price'] ? $value['product_details']['price'] * $value['quantity'] ?? 1 : ''); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm text-center">
                        <div class="size-208">
                            <span class="cl2 h5">
                                Total :
                            </span>
                        </div>
                        <div class="size-209">
                            <span class="mtext-110 cl2 badge bg-dark w-25 text-white total-price">
                                ₹ 0.00
                            </span>
                        </div>
                         
                    </div>
                    <!-- <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer mt-4">
                        Proceed to Checkout
                    </button> -->
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    include_once __DIR__ . "/layout/front/footer.php";
?>

<script>
    $(document).ready(function() {
    // Initialize the total to 0.00
    var total = 0.00;

    // Iterate through all elements with the class "item-price"
    $('.item-price').each(function() {
        // Parse the text content of each element as a float and add it to the total
        total += parseFloat($(this).attr('data-price'));
    });

    // Update the total in the HTML
    $('.total-price').text('₹ '+total.toFixed(2));
});

</script>