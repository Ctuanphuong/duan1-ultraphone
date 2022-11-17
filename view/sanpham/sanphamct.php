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
                        <?php
                            extract($one_pro);
                            $img = "admin/uploads/" . $img_pro;
                            echo '<div class="col-lg-5 col-md-5">
                            <div class="sp-images">
                                <div class="sp-largeimages sp-imagezoom">
                                    <div class="sp-singleimage" data-src="image/product/large-size/5.jpg">
                                        <img src="'.$img.'" alt="UltraPhone Product">
                                    </div>
                                </div>
                                <div class="sp-thumbs">
                                    <div class="sp-singlethumb">
                                        <img src="'.$img.'" alt="Ảnh sản phẩm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="sp-content">
                                <div class="sp-heading">
                                    <h5><a href="#">'.$name_pro.'</a></h5>
                                </div>
                            
                                <div class="rating-box">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                                <div class="price-box">
                                    <span class="new-price">'.number_format($price).' VNĐ</span>
                                    <!-- <span class="old-price">$21.51</span> -->
                                </div>
                                <div class="short-desc">
                                    <p>'.$short_des.'</p>
                                </div>
                                <div class="quantity">
                                    <label>Số lượng</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                    <div class="jb-quantity-btn_area">
                                        <a class="jb-quantity_btn" href="cart.html">Thêm giỏ hàng</a>
                                    </div>
                                </div>
                                <div class="jb-social_link jb-link_share">
                                    <span>Chia sẻ</span>
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/" data-bs-toggle="tooltip" target="_blank"
                                                title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com/" data-bs-toggle="tooltip" target="_blank"
                                                title="Twitter">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
                                        <li class="youtube">
                                            <a href="https://www.youtube.com/" data-bs-toggle="tooltip" target="_blank"
                                                title="Youtube">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip"
                                                target="_blank" title="Google Plus">
                                                <i class="fab fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://rss.com/" data-bs-toggle="tooltip" target="_blank"
                                                title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="wishlist-link_share"><a href="#"><i class="fa fa-heart"></i> Thêm vào
                                            danh sách yêu thích</a>
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
                                    <p class="short-desc">
                                        '.$detail_des.'
                                    </p>
                                </div>
                            </div>';
                        
                            ?>
                            <!-- End phần mô tả chỉ tiết -->
                            
                            <!-- Phần đánh giá, bình luận -->
                            <div id="reviews" class="tab-pane" role="tabpanel">
                                <div class="product_comments_block">
                                    <div class="comment_details same-stuff">
                                        <span class="user-id">Phương</span>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <em class="user-comment">Sản phẩm tuyệt vời</em>
                                        <em>25/03/2022</em>
                                    </div>
                                    <div class="review-btn_area">
                                        <a class="review-btn" href="#" data-bs-toggle="modal"
                                            data-bs-target="#mymodal">Đánh giá của bạn</a>
                                    </div>
                                    <!-- Begin Quick View Feedback Form -->
                                    <div class="modal fade modal-wrapper quickview-feedback_form" id="mymodal">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3 class="review-page-title">Viết đánh giá của bạn</h3>
                                                    <div class="modal-inner-area row">
                                                        <div class="col-lg-6">
                                                            <div class="jb-review-product">
                                                                <img src="image/product/large-size/1.jpg"
                                                                    alt="JB's Product">
                                                                <div class="jb-review-product-desc">
                                                                    <p class="jb-product-name"> <strong>Tên sản
                                                                            phẩm</strong></p>
                                                                    <p>
                                                                        <span>Mô tả ngắn
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="jb-review-content">
                                                                <!-- Begin Feedback Area -->
                                                                <div class="feedback-area">
                                                                    <div class="feedback">
                                                                        <h3 class="feedback-title">Phản hồi</h3>
                                                                        <form action="#">
                                                                            <p class="your-opinion">
                                                                                <label>Đánh giá</label>
                                                                                <span>
                                                                                    <select class="star-rating">
                                                                                        <option value="1">1</option>
                                                                                        <option value="2">2</option>
                                                                                        <option value="3">3</option>
                                                                                        <option value="4">4</option>
                                                                                        <option value="5">5</option>
                                                                                    </select>
                                                                                </span>
                                                                            </p>
                                                                            <p class="feedback-form">
                                                                                <label for="feedback">Bình luận</label>
                                                                                <textarea id="feedback" name="comment"
                                                                                    placeholder="Nhập bình luận của bạn..."
                                                                                    cols="45" rows="8"
                                                                                    aria-required="true"></textarea>
                                                                            </p>
                                                                            <div class="feedback-input">
                                                                                <div class="feedback-inner_btn">
                                                                                    <a href="#" class="close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close">Đóng</a>
                                                                                    <a href="#">Gửi</a>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- Feedback Area End Here -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Quick View Feedback Form Area End Here -->
                                </div>
                            </div>
                              <!-- End phần đánh giá, bình luận -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End phần mô tả chi tiết và đánh giá-->

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
                            <!-- Sản phẩm -->
                            <div class="jb-slide-item">
                                <div class="jb-single_product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="./src/image/product/medium-size/1-5.jpg" alt="UltraPhone Product">
                                        </a>
                                        <span class="sticker">New</span>
                                        <div><a href="#" title="Quick View" class="quick-view-btn"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i
                                                    class="fa fa-search"></i></a></div>
                                    </div>
                                    <div class="jb-product_content">
                                        <div class="product-desc_info">
                                            <div class="manufacturer">
                                                <a href="shop-left-sidebar.html">Studio Design</a>
                                            </div>
                                            <h6><a class="product-name" href="single-product.html">720 Degree Panoramic
                                                    HD 360...</a></h6>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="price-box">
                                                <span class="new-price">$29.51</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul>
                                                <li><a class="jb-wishlist_link" href="wishlist.html"><i
                                                            class="fa fa-heart"></i></a></li>
                                                <li><a class="jb-add_cart" href="cart.html"><i
                                                            class="icon_cart_alt"></i>Thêm giỏ hàng</a></li>
                                                <li><a class="jb-sp_link" href="single-product.html"><i
                                                            class="fa fa-copy"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End sản phẩm -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End phần các sản phẩm cùng loại -->