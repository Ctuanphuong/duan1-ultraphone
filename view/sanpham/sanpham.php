<!-- Begin JB's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Trang chủ</a></li>
                <li class="active">Sản phẩm</li>
            </ul>
        </div>
    </div>
</div>
<!-- JB's Breadcrumb Area End Here -->

<!-- Begin JB's Content Wrapper Area -->
<div class="jb-content_wrapper">
    <div class="container">
        <div class="row">
            <!-- Begin Sidebar Categories Area -->
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="jb-sidebar-catagories_area">
                    <div class="sidebar-checkbox first-child">
                        <div class="sidebar-checkbox_title">
                            <h5>Danh mục</h5>
                        </div>
                        <ul class="sidebar-checkbox_list">
                            <?php
                            foreach ($listcate as $cate) {
                                extract($cate);
                                $linkdetail = "index.php?act=product&idcate=" . $id_cate;
                                echo ' <li>
                                        <a href="' . $linkdetail . '"><i class="fa-sharp fa-solid fa-angles-right"></i> ' . $name_cate . '</a>
                                      </li>';
                            }
                            ?>
                        </ul>
                    </div>

                    <!-- Begin JB's Sidebar Banner Area -->
                    <div class="jb-sidebar_banner">
                        <div class="banner-item">
                            <a href="#">
                                <img src="./src/image/shop/1.jpg" alt="Ultraphone Product">
                            </a>
                        </div>
                    </div>
                    <!-- JB's Sidebar Banner Area End Here -->
                    <!-- Show sản phẩm được đề xuất -->
                    <div class="row sidebar-list_product">
                        <div class="col-lg-12">
                            <div class="section_title-2">
                                <h4>Được đề xuất</h4>
                            </div>
                            <div class="jb-list-product_slider">
                                <!-- Begin JB's Slide Item Area -->
                                <?php
                                foreach ($list_topsp as $topsp) {
                                    extract($topsp);
                                    $linkdetail = "./index.php?act=prodetail&idpro=" . $id_pro;
                                    $img_home = "./admin/uploads/" . $img_pro;
                                    echo '<div class="jb-slide-item">
                                            <div class="jb-single_product">
                                                <div class="product-img">
                                                    <a href="' . $linkdetail . '">
                                                        <img src="' . $img_home . '" alt="Ảnh sản phẩm">
                                                    </a>
                                                </div>
                                                <div class="jb-product_content">
                                                    <div class="product-desc_info">
                                                        <div class="product-name">
                                                            <h6>
                                                                <a href="' . $linkdetail . '">' . $name_pro . '</a>
                                                            </h6>
                                                            
                                                        </div>
                                                        <div class="price-pro">
                                                            <span class="price-17">' . number_format($price) . ' VNĐ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                }
                                ?>

                                <!-- JB's Slide Item Area End Here -->
                            </div>
                        </div>
                    </div>
                    <!-- JB's List Product Slider Area End Here -->
                </div>
            </div>
            <!-- Sidebar Categories Area End Here -->
            <!-- Begin Shopbar With Banner Area -->
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="shopbar-with_banner">
                    <div class="jb-sidebar_banner">
                        <div class="banner-item">
                            <a href="#">
                                <img src="./src/image/shop/saleip12.jpg" alt="Ultraphone Product">
                            </a>
                        </div>
                    </div>
                    <!-- Begin Shop Topbar Area -->
                    <div class="shop-topbar">
                        <div class="shopbar-inner">
                            <div class="product-view-mode">
                                <ul class="nav shop-item-filter-list" role="tablist">
                                    <li class="active" role="presentation"><a aria-selected="true" class="active show" data-bs-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                    <li role="presentation"><a data-bs-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                            </div>
                            <div class="toolbar-amount">
                                <span>Hiện có 10 sản phẩm.</span>
                            </div>
                        </div>
                        <div class="product-select-box">
                            <div class="product-short">
                                <form action="index.php?act=product" method="post">
                                    <input type="text" class="ip-search" name="kyw" placeholder="Nhập tên sản phẩm...">
                                    <input type="submit" name="btn-search" class="btn-search" value="Tìm kiếm">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Topbar Area End Here -->
                    <!-- Vùng hiển thị sản phẩm -->
                    <div class="shop-products-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show shop-products_grid" role="tabpanel">
                                <div class="row">
                                    <?php
                                    if (empty($listpro)) {
                                        echo '<div class="no-found">
                                        <div class="img-no-found">
                                            <img src="./src/image/error/no-product.png" alt="Ảnh báo lỗi">
                                        </div>
                                        <h1 class="noresult">Oops...không tồn tại sản phẩm trùng khớp với từ khóa bạn nhập, vui
                                            lòng tìm kiếm sản phẩm khác <i class="fa-solid fa-face-sad-tear"></i></h1>

                                    </div>';
                                    }
                                    foreach ($listpro as $pro) { ?>
                                        <!-- extract($pro);
                                        $linkdetail = "./index.php?act=prodetail&idpro=" . $id_pro;
                                        $img_home = "./admin/uploads/" . $img_pro; -->
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <div class="jb-slide-item">
                                                <div class="jb-single_product">
                                                    <div class="product-img">
                                                        <a href="index.php?act=prodetail&idpro=<?php echo $pro['id_pro'] ?>">
                                                            <img src="admin/uploads/<?php echo $pro['img_pro'] ?>" alt="Ảnh sản phẩm">
                                                        </a>
                                                        <span class="sticker">Mới</span>
                                                        <div><a href="index.php?act=prodetail&idpro=<?php echo $pro['id_pro'] ?>" title="Quick View" class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa fa-search"></i></a></div>
                                                    </div>
                                                    <div class="jb-product_content">
                                                        <div class="product-desc_info">
                                                            <h6><a class="product-name" href="index.php?act=prodetail&idpro=<?php echo $pro['id_pro'] ?>"><?php echo $pro['name_pro'] ?></a>
                                                            </h6>
                                                            
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
                                                                <span class="new-price"><?php echo number_format($pro['price']) ?>
                                                                    VNĐ</span>
                                                            </div>
                                                        </div>
                                                        <div class="add-actions">
                                                            <ul>
                                                                <li><a class="jb-wishlist_link" href="#"><i class="fa fa-heart"></i></a></li>
                                                                <li><a class="jb-add_cart" href="#"><i class="icon_cart_alt"></i>Thêm giỏ hàng</a></li>
                                                                <li><a class="jb-sp_link" href="#"><i class="fa fa-copy"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php   } ?>


                                    <!-- JB's Slide Item Area End Here -->
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="paginatoin-area">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="product-select-box">
                                                        <div class="product-short">
                                                            <p>Hiển thị</p>
                                                            <select class="nice-select">
                                                                <option value="5">5</option>
                                                                <option value="10">10</option>
                                                                <option value="15">15</option>
                                                                <option value="20">20</option>
                                                                <option value="25">25</option>
                                                            </select>
                                                            <span>mỗi trang</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <ul class="pagination-box">
                                                        <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i>
                                                                Trang trước</a>
                                                        </li>
                                                        <li class="active"><a href="#">1</a></li>
                                                        <li><a href="#">2</a></li>
                                                        <li><a href="#">3</a></li>
                                                        <li>
                                                            <a href="#" class="Next"> Trang sau <i class="fa fa-chevron-right"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="list-view" class="tab-pane fade shop-product-list_view" role="tabpanel">
                                <div class="row g-0">
                                    <div class="col-lg-12">
                                        <?php
                                        foreach ($listpro as $pro) {
                                            extract($pro);
                                            $linkdetail = "./index.php?act=prodetail&idpro=" . $id_pro;
                                            $img_home = "admin/uploads/" . $img_pro;
                                            echo '<div class="row g-0 jb-slide-item">
                                                    <div class="col-lg-4 col-md-4 jb-single_product">
                                                        <div class="product-img">
                                                            <a href="' . $linkdetail . '">
                                                                <img src="' . $img_home . '" alt="Ảnh sản phẩm">
                                                            </a>
                                                            <div><a href="' . $linkdetail . '" title="Quick View" class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i
                                                                        class="fa fa-search"></i></a></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8">
                                                        <div class="jb-product_content">
                                                            <div class="product-desc_info">
                                                                <h6><a class="product-name" href="' . $linkdetail . '">' . $name_pro . '</a></h6>
                                                                <div class="rating-box">
                                                                <ul>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            </div>
                                                                <div class="product-desc">
                                                                    <p>' . $short_des . '</p>
                                                                </div>
                                                                <div class="price-box">
                                                                    <span class="old-price">50,000,000 VNĐ</span>
                                                                    <span class="new-price">' . number_format($price) . ' VNĐ</span>
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul>
                                                                    <li><a class="jb-wishlist_link" href="#"><i class="fa fa-heart"></i></a></li>
                                                                    <li><a class="jb-add_cart" href="#"><i class="icon_cart_alt"></i>Thêm giỏ hàng</a></li>
                                                                    <li><a class="jb-sp_link" href="#"><i class="fa fa-copy"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>';
                                        }
                                        ?>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="paginatoin-area">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="product-select-box">
                                                        <div class="product-short">
                                                            <p>Hiển thị</p>
                                                            <select class="nice-select">
                                                                <option value="5">5</option>
                                                                <option value="10">10</option>
                                                                <option value="15">15</option>
                                                                <option value="20">20</option>
                                                                <option value="25">25</option>
                                                            </select>
                                                            <span>mỗi trang</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <ul class="pagination-box">
                                                        <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i>
                                                                Trang sau</a>
                                                        </li>
                                                        <li class="active"><a href="#">1</a></li>
                                                        <li><a href="#">2</a></li>
                                                        <li><a href="#">3</a></li>
                                                        <li>
                                                            <a href="#" class="Next"> Trang trước <i class="fa fa-chevron-right"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End vùng hiển thị sản phẩm-->
                </div>
            </div>
            <!-- Shopbar With Banner Area End Here -->
        </div>
    </div>
</div>
<!-- JB's Content Wrapper Area End Here -->