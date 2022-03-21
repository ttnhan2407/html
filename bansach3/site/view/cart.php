<?php
include 'inc/header.php'
?>
<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="?controller=index">Trang chủ</a></li>
                    <li><a href="?controller=shop">Cửa hàng</a></li>

                    <li class="active"><a href="?controller=cart">Giỏ hàng</a></li>
                    <li><a href="?controller=checkout">Thanh toán</a></li>
                    <li><a href="?controller=contact">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Giỏ hàng mua sắm</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container-fluid">
        <div class="row">
            <!--  <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Tìm kiếm sản phẩm</h2>
                        <input type="text" id="myInput" onkeyup ="myFunction()" placeholder="Từ khóa sản phẩm..." autocomplete="off">
                    </div>


                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Kết quả tìm kiếm</h2>

                    </div>

                </div>
 -->
            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <form method="post" action="#">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-subtotal">Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td class="actions" colspan="6">
                                            <div class="coupon">
                                                <label for="coupon_code">Mã giảm giá:</label>
                                                <!-- Ma mac dinh = 111 -->
                                                <input type="text" placeholder="Mã giảm giá" value="" id="magiamgia" class="input-text" name="coupon_code">
                                                <input type="button" class="btn btn-success" id="giamgiasp" onclick="apply_redure(magiamgia.value)" value="Áp dụng giảm giá" name="apply_coupon" class="button">
                                            </div>
                                            <input type="submit" value="Cập nhật" name="update_cart" class="button" id="updatesp">
                                            <a href="?controller=checkout" type="button" class="btn btn-info" Thanh toán name="proceed" class="checkout-button button alt wc-forward" id="thanhtoansp">
                                                Thanh toán
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>

                        <div class="cart-collaterals">


                            <div class="cross-sells">
                                <h2>Bạn có thể thích...</h2>
                                <?php

                                $quan = 2;
                                $getpd = $product->GetXProduct($quan);
                                if ($getpd) {
                                    $i = 0;
                                    while ($row = $getpd->fetch_assoc()) {

                                        if ($i > $quan - 1) break;
                                        //$this->SetID($row["id"]);
                                        echo '<ul class="products">
                                                    <li class="product">
                                                <a href="?controller=single&id=' . $row["id"] . '">
                                                <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="../img/' . $row["image_link"] . '">
                                                <h3>' . $row["name"] . '</h3>
                                                <span class="price"><span class="amount"><ins>' . number_format($row["price2"]) . '<sup>đ</sup></ins> <del>' . number_format($row["price1"]) . '<sup>đ</sup></span></span>
                                                 </a>

                                                <a class="add_to_cart_button"  data-p-id="' . $row["id"] . '" data-p-name="' . $row["name"] . '" data-p-image="' . $row["image_link"] . '" data-p-price="' . $row["price2"] . '" rel="nofollow" >Chọn</a>
                                                </li>';
                                        $i++;
                                    }
                                }

                                ?>
                                <!--<ul class="products">
                                    <li class="product">
                                        <a href="tamquoc.html">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-2.jpg">
                                            <h3>Tam Quốc Diễn Nghĩa</h3>
                                            <span class="price"><span class="amount"><ins>300.000<sup>đ</sup></ins> <del>369.000<sup>đ</sup></span></span>
                                        </a>

                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="tamquoc.html">Chọn</a>
                                    </li>
                                <ul class="products">
                                    <li class="product">
                                        <a href="matbiec.html">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-4.jpg">
                                            <h3>Mắt biếc</h3>
                                            <span class="price"><span class="amount"><ins>60.000<sup>đ</sup></ins> <del>75.000<sup>đ</sup></span></span>
                                        </a>

                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="matbiec.html">Chọn</a>
                                    </li>-->
                                </ul>
                            </div>


                            <div class="cart_totals ">
                                <h2>Tổng giỏ hàng</h2>
                                <div style="color:red" id="tbgiamgia">
                                    <small> </small>

                                </div>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Tổng tạm</th>
                                            <td>
                                                <span class="cart-amunt">110.000 VND</span>
                                            </td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Vận chuyển và xử lí</th>
                                            <td>Free Shipping</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Tổng hóa đơn</th>
                                            <td><strong><span id="tonghoadon">0<sup>đ</sup></span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'inc/footer.php'
?>