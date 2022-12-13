<!-- BANNER SLIDE LỚN -->
<div class="jb-slider_area">
    <div class="main-slider">
        <!-- Begin Single Slide Area -->
        <div class="single-slide animation-style-01 bg-1">
            <div class="container">
                <div class="slider-content">
                    <span>Chức thức phát hành tại Việt Nam</span>
                    <h2>Xiaomi 5G</h2>
                    <h3>Độc quyền chính hãng</h3>
                    <h5>Giá rẻ bất ngờ</h5>
                    <div class="jb-btn-ps_center slide-btn">
                        <a class="jb-btn" href="index.php?act=product&idcate=11">Mua ngay</a>
                    </div>
                </div>
                <div class="slider-progress"></div>
            </div>
        </div>
        <!-- Single Slide Area End Here -->
        <!-- Begin Single Slide Area -->
        <div class="single-slide animation-style-02 bg-2">
            <div class="container">
                <div class="slider-content">
                    <span>Realme trên tay, World Cup mê say</span>
                    <h2>Realme 5</h2>
                    <h3>Sale off 20%</h3>
                    <h5>Chính hãng, giá rẻ, có trả góp</h5>
                    <div class="jb-btn-ps_center slide-btn">
                        <a class="jb-btn" href="index.php?act=product&idcate=10">Mua ngay</a>
                    </div>
                </div>
                <div class="slider-progress"></div>
            </div>
        </div>
        <!-- Single Slide Area End Here -->
    </div>
</div>


<!-- 4 BANNER NHỎ -->
<div class="jb-banner_area banner-four_columns">
    <div class="row g-0 remove-g-0_md">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="banner-item">
                <a href="index.php?act=product">
                    <img src="./src/image/banner/oppo.png" alt="Ultraphone Product" />
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="banner-item">
                <a href="index.php?act=product">
                    <img src="./src/image/banner/realme.jpg" alt="Ultraphone Product" />
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="banner-item">
                <a href="index.php?act=product">
                    <img src="./src/image/banner/samsung.jpg" alt="Ultraphone Product" />
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="banner-item">
                <a href="index.php?act=product">
                    <img src="./src/image/banner/xiaomi.png" alt="Ultraphone Product" />
                </a>
            </div>
        </div>
    </div>
</div>

<!-- FREE SHIP -->
<div class="jb-shipping_area">
    <div class="container">
        <div class="row">
            <!-- Begin Shipping Information Area -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="shipping-info">
                    <div class="shipping-icon">
                        <i class="fa fa-truck"></i>
                    </div>
                    <div class="shipping-text">
                        <h5>Miễn phí Ship</h5>
                        <span>Miễn phí Ship khu vực Việt Nam</span>
                    </div>
                </div>
            </div>
            <!-- Shipping Information Area End Here -->
            <!-- Begin Shipping Information Area -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="shipping-info">
                    <div class="shipping-icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <div class="shipping-text">
                        <h5>Thanh toán khi nhận hàng</h5>
                        <span>Tùy chọn tiền mặt khi nhận hàng</span>
                    </div>
                </div>
            </div>
            <!-- Shipping Information Area End Here -->
            <!-- Begin Shipping Information Area -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="shipping-info">
                    <div class="shipping-icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <div class="shipping-text">
                        <h5>Bảo hành 12 tháng</h5>
                        <span>Đổi trả trong vòng 7 ngày</span>
                    </div>
                </div>
            </div>
            <!-- Shipping Information Area End Here -->
            <!-- Begin Shipping Information Area -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="shipping-info">
                    <div class="shipping-icon">
                        <i class="fas fa-star-of-life"></i>
                    </div>
                    <div class="shipping-text">
                        <h5>Hỗ trợ trực tuyến 24/7</h5>
                        <span>Chúng tôi luôn sẵn sàng hỗ trợ 24/7</span>
                    </div>
                </div>
            </div>
            <!-- Shipping Information Area End Here -->
        </div>
    </div>
</div>
<!-- JB's Shipping Area End Here -->

<!-- PHẦN SẢN PHẨM TRANG HOME -->
<div class="jb-product-tab_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-tab">
                    <ul class="nav product-menu">
                        <li>
                            <a class="active" data-bs-toggle="tab" href="#new-arrival"><span>Sản phẩm mới</span></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tab" href="#bestseller"><span>Sản phẩm bán chạy</span></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tab" href="#featured-products"><span>Sản phẩm nổi bật</span></a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content jb-tab_content">
                    <div id="new-arrival" class="tab-pane active show" role="tabpanel">
                        <div class="jb-product-tab_slider">
                            <!-- Phần show sản phẩm mới nhất -->
                            <?php
                            foreach ($prohome as $pro) { ?>
                                <div class="jb-slide-item">
                                    <div class="jb-single_product">
                                        <div class="product-img">
                                            <a href="index.php?act=prodetail&idpro=<?php echo $pro['id_pro'] ?>"><img src="admin/uploads/<?php echo $pro['img_pro'] ?>" alt="Ảnh sản phẩm" />
                                            </a>
                                            <span class="sticker">Mới</span>
                                            <?php if ($pro['discount'] <= 0) { ?>
                                                <span></span>
                                            <?php } else { ?>
                                                <span class="sticker-2">-<?= $pro['discount'] ?>%</span>
                                            <?php } ?>
                                        </div>
                                        <div class="jb-product_content">
                                            <div class="product-desc_info">
                                                <h6>
                                                    <a class="product-name" href="index.php?act=prodetail&idpro=<?php echo $pro['id_pro'] ?>"><?php echo $pro['name_pro'] ?></a>
                                                </h6>
                                             
                                                <div class="price-box">
                                                    <?php if ($pro['discount'] <= 0) { ?>
                                                        <span class="new-price"><?= number_format($pro['price']) ?>₫</span>
                                                    <?php } else { ?>
                                                        <span class="new-price"><?= number_format(($pro['price']) - (($pro['price']) * ($pro['discount']) / 100)) ?>₫</span>
                                                        <span class="old-price"><?= number_format($pro['price']) ?>₫</span>
                                                    <?php } ?>


                                                </div>
                                            </div>
                                            <div class="actions-add">
                                                <form action="index.php?act=addtocart" method="post">
                                                    <ul>
                                                        
                                                        <input type="hidden" name="id_pro" value="<?php echo $pro['id_pro'] ?>">
                                                        <input type="hidden" name="name_pro" value="<?php echo $pro['name_pro'] ?>">
                                                        <input type="hidden" name="img_pro" value="<?php echo $pro['img_pro'] ?>">
                                                        <input type="hidden" name="price" value="<?php echo $pro['price'] ?>">
                                                        <li>
                                                            <input type="submit" class="addtocart" name="addtocart" value="Thêm vào giỏ">
                                                        </li>
                                                      
                                                    </ul>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php   } ?>

                            <!-- end phần show sản sản phẩm mới nhất -->
                        </div>
                    </div>
                    <div id="bestseller" class="tab-pane" role="tabpanel">
                    <div class="jb-product-tab_slider">
                            <!-- Sản phẩm bán chạy -->
                            <?php
                            foreach ($list_bestsp as $pro) { ?>
                                <div class="jb-slide-item">
                                    <div class="jb-single_product">
                                        <div class="product-img">
                                            <a href="index.php?act=prodetail&idpro=<?= $pro['id_pro'] ?>"><img src="admin/uploads/<?= $pro['img_pro'] ?>" alt="Ảnh sản phẩm" />
                                            </a>
                                            <span class="sticker">Hot</span>
                                            <?php if ($pro['discount'] <= 0) { ?>
                                                <span></span>
                                            <?php } else { ?>
                                                <span class="sticker-2">-<?= $pro['discount'] ?>%</span>
                                            <?php } ?>
                                         
                                        </div>
                                        <div class="jb-product_content">
                                            <div class="product-desc_info">
                                                <h6>
                                                    <a class="product-name" href="index.php?act=prodetail&idpro=<?= $pro['id_pro'] ?>"><?= $pro['name_pro'] ?></a>
                                                </h6>
                                               
                                                <div class="price-box">
                                                    <?php if ($pro['discount'] <= 0) { ?>
                                                        <span class="new-price"><?= number_format($pro['price']) ?>₫</span>
                                                    <?php } else { ?>
                                                        <span class="new-price"><?= number_format(($pro['price']) - (($pro['price']) * ($pro['discount']) / 100)) ?>₫</span>
                                                        <span class="old-price"><?= number_format($pro['price']) ?>₫</span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="actions-add">
                                                <form action="index.php?act=addtocart" method="post">
                                                    <ul>
                                                       
                                                        <input type="hidden" name="id_pro" value="<?php echo $pro['id_pro'] ?>">
                                                        <input type="hidden" name="name_pro" value="<?php echo $pro['name_pro'] ?>">
                                                        <input type="hidden" name="img_pro" value="<?php echo $pro['img_pro'] ?>">
                                                        <input type="hidden" name="price" value="<?php echo $pro['price'] ?>">
                                                        <li>
                                                            <input type="submit" class="addtocart" name="addtocart" value="Thêm vào giỏ">
                                                        </li>
                                                     
                                                    </ul>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            
                            <!-- End sản phẩm bán chạy -->
                        </div>
                    </div>

                    <!-- show sản phẩm nổi bật -->
                    <div id="featured-products" class="tab-pane" role="tabpanel">
                        <div class="jb-product-tab_slider">
                            <!-- Phần show sản phẩm nổi bật -->
                            <?php
                            foreach ($list_topsp as $pro) { ?>
                                <div class="jb-slide-item">
                                    <div class="jb-single_product">
                                        <div class="product-img">
                                            <a href="index.php?act=prodetail&idpro=<?= $pro['id_pro'] ?>"><img src="admin/uploads/<?= $pro['img_pro'] ?>" alt="Ảnh sản phẩm" />
                                            </a>
                                            <span class="sticker">Nổi bật</span>
                                            <?php if ($pro['discount'] <= 0) { ?>
                                                <span></span>
                                            <?php } else { ?>
                                                <span class="sticker-2">-<?= $pro['discount'] ?>%</span>
                                            <?php } ?>
                                            
                                        </div>
                                        <div class="jb-product_content">
                                            <div class="product-desc_info">
                                                <h6>
                                                    <a class="product-name" href="index.php?act=prodetail&idpro=<?= $pro['id_pro'] ?>"><?= $pro['name_pro'] ?></a>
                                                </h6>
                                             
                                                <div class="price-box">
                                                    <?php if ($pro['discount'] <= 0) { ?>
                                                        <span class="new-price"><?= number_format($pro['price']) ?>₫</span>
                                                    <?php } else { ?>
                                                        <span class="new-price"><?= number_format(($pro['price']) - (($pro['price']) * ($pro['discount']) / 100)) ?>₫</span>
                                                        <span class="old-price"><?= number_format($pro['price']) ?>₫</span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="actions-add">
                                                <form action="index.php?act=addtocart" method="post">
                                                    <ul>
                                                        
                                                        <input type="hidden" name="id_pro" value="<?php echo $pro['id_pro'] ?>">
                                                        <input type="hidden" name="name_pro" value="<?php echo $pro['name_pro'] ?>">
                                                        <input type="hidden" name="img_pro" value="<?php echo $pro['img_pro'] ?>">
                                                        <input type="hidden" name="price" value="<?php echo $pro['price'] ?>">
                                                        <li>
                                                            <input type="submit" class="addtocart" name="addtocart" value="Thêm vào giỏ">
                                                        </li>
                                                      
                                                    </ul>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- end phần show sản phẩm nổi bật -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JB's Product Tab Area End Here -->


<!-- Begin Ultraphone Product Various Style Area -->
<div class="jb-banner_area banner-various_style">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-lg-6">
                <div class="banner-item">
                    <a href="index.php?act=product&idcate=11">
                        <img src="./src/image/banner/poco.jpg" alt="Ultraphone Product" />
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-0">
                    <div class="col-lg-6 col-md-6">
                        <div class="banner-item">
                            <a href="index.php?act=product&idcate=8">
                                <img src="./src/image/banner/ipx.jpg" alt="Ultraphone Product" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="row g-0">
                            <div class="col-lg-12">
                                <div class="banner-item">
                                    <a href="index.php?act=product&idcate=14">
                                        <img src="./src/image/banner/sony.jpg" alt="Ultraphone Product" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="banner-item">
                                    <a href="index.php?act=product&idcate=11">
                                        <img src="./src/image/banner/blue.jpg" alt="Ultraphone Product" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ultraphone Product Various Style Area End Here -->

<!-- Begin Ultraphone Product With Content Area -->
<div class="banner-with-content_area @@item-separation">
    <!-- Begin Ultraphone Product Content Area -->
    <div class="jb-banner_content">
        <div class="product-discount">
            <span>Giảm giá lên tới 20%</span>
        </div>
        <div class="product-facility">
            <h2>iPhone 14 Promax</h2>
        </div>
        <div class="product-desc" style="margin-top: 5px;">
            <p>
                Mua điện thoại iPhone 14, 14 Plus, 14 Pro, 14 Pro Max tại UltraPhone. Trả Góp 0%. Thu cũ đổi mới giá tốt. Nhiều ưu đãi khủng. Chần chừ gì nữa mà không nhấc máy đặt hàng ngay?
            </p>
        </div>
        <div class="jb-btn-ps_left slide-btn">
            <a class="jb-btn-bondi_blue" href="index.php?act=product&idcate=8">Mua ngay</a>
        </div>
    </div>
    <!-- Ultraphone Product Content Area End Here -->
</div>
<!-- Ultraphone Product With Content Area End Here -->


<!--Banner sale -->
<div class="jb-banner_area banner-two_columns">
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-6">
                <div class="banner-item">
                    <a href="index.php?act=product&idcate=12">
                        <img src="./src/image/banner/banner-vsm.jpg" alt="Ultraphone Product" />
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-item">
                    <a href="index.php?act=product&idcate=11">
                        <img src="./src/image/banner/banner-xiaomi.jpg" alt="Ultraphone Product" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ultraphone Product With Two Columns Area End Here -->