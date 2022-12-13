<!-- Phần mở đầu trang chi tiết sp -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Trang chủ</a></li>
                <li class="active">Chi tiết sản phẩm</li>
            </ul>
        </div>
    </div>
</div>
<!-- end-->

<!-- Phần show chi tiết sản phẩm -->
<div class="sp-area">
    <div class="container">
        <div class="sp-nav">
            <div class="row">
                <?php extract($one_pro); ?>
                <div class="col-lg-5 col-md-5">
                    <div class="sp-images">
                        <div class="sp-largeimages sp-imagezoom">
                            <div class="sp-singleimage">
                                <img src="admin/uploads/<?= $one_pro['img_pro']; ?>" alt="UltraPhone Product">
                            </div>
                        </div>
                        <div class="sp-thumbs">
                            <div class="sp-singlethumb">
                                <img src="admin/uploads/<?= $one_pro['img_pro']; ?>" alt="Ảnh sản phẩm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="sp-content">
                        <div class="sp-heading">
                            <h5><a href="index.php?act=prodetail&idpro=<?php echo $pro['id_pro'] ?>">
                                    <?= $one_pro['name_pro'] ?>
                                </a></h5>
                            <span class="reference">Lượt xem: <?= $one_pro['view'] ?></span>
                        </div>


                        <div class="price-box">
                            <?php if ($one_pro['discount'] <= 0) { ?>
                                <span class="new-price">
                                    <?= number_format($one_pro['price']) ?>₫
                                </span>
                            <?php } else { ?>
                                <span class="new-price">
                                    <?= number_format(($one_pro['price']) - (($one_pro['price']) * ($one_pro['discount']) /
                                        100)) ?>₫
                                </span>
                                <span class="old-price">
                                    <?= number_format($one_pro['price']) ?>₫
                                </span>
                            <?php } ?>


                        </div>
                        <div class="short-desc">
                            <p>
                                <?= $one_pro['short_des'] ?>
                            </p>
                        </div>
                        <form action="index.php?act=addtocart" method="post">
                            <div class="quantity">
                                <div class="flex-addtocart">
                                    <label>Số lượng</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" name="quatity" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                    <div class="detail-addpro">
                                        <input type="hidden" name="id_pro" value="<?php echo $one_pro['id_pro'] ?>">
                                        <input type="hidden" name="name_pro" value="<?php echo $one_pro['name_pro'] ?>">
                                        <input type="hidden" name="img_pro" value="<?php echo $one_pro['img_pro'] ?>">
                                        <input type="hidden" name="price" value="<?php echo $one_pro['price'] ?>">
                                        <input type="submit" name="addtocart" class="addtocart" value="Thêm giỏ hàng">
                                    </div>
                                </div>
                            </div>


                            <div class="block-reassurance">
                                <ul>
                                    <li><i class="fas fa-check-square"></i>Bảo hành chính hãng</li>
                                    <li><i class="fa fa-truck"></i>Giao hàng nhanh chóng</li>
                                    <li><i class="fas fa-sync-alt"></i>Chế độ đổi trả trong vòng 12 tháng</li>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end phần show chi tiết sản phẩm -->

<!-- Phần mô tả chi tiết và đánh giá -->
<div class="jb-product-tab_area sp-product-tab_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-tab">
                    <ul class="nav product-menu">
                        <li><a class="active" data-bs-toggle="tab" href="#description"><span>Chi tiết</span></a>
                        </li>
                        <li><a data-bs-toggle="tab" href="#reviews"><span>Đánh giá</span></a></li>
                    </ul>
                </div>
                <div class="tab-content jb-tab_content">
                    <!-- Phần mô tả chỉ tiết -->
                    <div id="description" class="tab-pane active show" role="tabpanel">
                        <div class="product-description">
                            <p class="short-desc"> <strong style="font-size: 20px; line-height: 2">Thông số kỹ
                                    thuật:</strong> <br>
                                <?= $one_pro['detail_des'] ?>
                            </p>
                        </div>
                    </div>
                    <!-- End phần mô tả chỉ tiết -->

                    <!-- Phần đánh giá, bình luận -->
                    <div id="reviews" class="tab-pane" role="tabpanel">
                        <!-- jquery bình luận -->
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $("#comment").load("./view/binhluan/formbinhluan.php", {
                                    idpro: <?= $one_pro['id_pro'] ?>,
                                });
                            });
                        </script>
                        <div id="comment"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End phần mô tả chi tiết và đánh giá-->

<!-- Phần các sản phẩm cùng loại nhưng hidden vì ko fix được nữa đành phải coi là thẻ ảo, phần div bên dưới mới là show ra =))))-->
<div class="jb-product-slider_area sp-product-slider_area" hidden>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title-2">
                    <h4>Các sản phẩm cùng loại</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="jb-product_slider">
                    <?php foreach ($similar_pro as $pro) { ?>
                        <!-- Sản phẩm -->
                        <div class="jb-slide-item">
                            <div class="jb-single_product">
                                <div class="product-img">
                                    <a href="index.php?act=prodetail&idpro=<?php echo $pro['id_pro']; ?>">
                                        <img src="admin/uploads/<?php echo $pro['img_pro']; ?>" alt="UltraPhone Product">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="jb-product_content">
                                    <div class="product-desc_info">
                                        <h6><a class="product-name" href="index.php?act=prodetail&idpro=<?php echo $pro['id_pro'] ?>">
                                                <?php echo $pro['name_pro']; ?>
                                            </a></h6>
                                        <div class="price-box">
                                            <span class="new-price">
                                                <?php echo number_format($pro['price']); ?>₫
                                            </span>
                                            <!-- <del class="new-price"><?php echo number_format($pro['price']); ?>₫</del> -->
                                        </div>
                                    </div>
                                    <div class="actions-add">
                                        <form action="index.php?act=addtocart" method="post">
                                            <ul>
                                                <li>
                                                    <a class="jb-wishlist_link" href="#"><i class="fa fa-heart"></i></a>
                                                </li>
                                                <input type="hidden" name="id_pro" value="<?php echo $pro['id_pro'] ?>">
                                                <input type="hidden" name="name_pro" value="<?php echo $pro['name_pro'] ?>">
                                                <input type="hidden" name="img_pro" value="<?php echo $pro['img_pro'] ?>">
                                                <input type="hidden" name="price" value="<?php echo $pro['price'] ?>">
                                                <li>
                                                    <input type="submit" class="addtocart" name="addtocart" value="Thêm vào giỏ">
                                                </li>
                                                <li>
                                                    <a class="jb-sp_link" href="#"><i class="fa fa-copy"></i></a>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- End sản phẩm -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End phần các sản phẩm cùng loại -->

<!-- Phần các sản phẩm cùng loại -->
<div class="jb-product-slider_area sp-product-slider_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title-2">
                    <h4>Các sản phẩm cùng loại</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="jb-product_slider">
                    <?php foreach ($similar_pro as $pro) { ?>
                        <!-- Sản phẩm -->
                        <div class="jb-slide-item">
                            <div class="jb-single_product">
                                <div class="product-img">
                                    <a href="index.php?act=prodetail&idpro=<?php echo $pro['id_pro']; ?>">
                                        <img src="admin/uploads/<?php echo $pro['img_pro']; ?>" alt="UltraPhone Product">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="jb-product_content">
                                    <div class="product-desc_info">
                                        <h6><a class="product-name" href="index.php?act=prodetail&idpro=<?php echo $pro['id_pro'] ?>">
                                                <?php echo $pro['name_pro']; ?>
                                            </a></h6>
                                        <div class="price-box">
                                            <span class="new-price">
                                                <?php echo number_format($pro['price']); ?>₫
                                            </span>
                                            <!-- <del class="new-price"><?php echo number_format($pro['price']); ?>₫</del> -->
                                        </div>
                                    </div>
                                    <div class="actions-add">
                                        <form action="index.php?act=addtocart" method="post">
                                            <ul>
                                                <li>
                                                    <a class="jb-wishlist_link" href="#"><i class="fa fa-heart"></i></a>
                                                </li>
                                                <input type="hidden" name="id_pro" value="<?php echo $pro['id_pro'] ?>">
                                                <input type="hidden" name="name_pro" value="<?php echo $pro['name_pro'] ?>">
                                                <input type="hidden" name="img_pro" value="<?php echo $pro['img_pro'] ?>">
                                                <input type="hidden" name="price" value="<?php echo $pro['price'] ?>">
                                                <li>
                                                    <input type="submit" class="addtocart" name="addtocart" value="Thêm vào giỏ">
                                                </li>
                                                <li>
                                                    <a class="jb-sp_link" href="#"><i class="fa fa-copy"></i></a>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- End sản phẩm -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End phần các sản phẩm cùng loại -->