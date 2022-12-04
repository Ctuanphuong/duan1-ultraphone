 <!-- phần active trang đang được hiển thị-->
 <div class="breadcrumb-area">
     <div class="container">
         <div class="breadcrumb-content">
             <ul>
                 <li><a href="index.php">Trang chủ</a></li>
                 <li class="active">Đặt hàng</li>
             </ul>
         </div>
     </div>
 </div>
 <!--end phần active trang đang được hiển thị-->
 <article class="mt-3 container-sm">
     <h5 class="alert alert-primary">Đặt hàng thành công! Cảm ơn quý khách đã mua hàng của UltraPhone</h5>
     <?php
        if (isset($bill) && is_array($bill)) {
            extract($bill);
        }
        ?>
     <!-- mã đơn hàng -->
     <div class="card mb-4">
         <div class="card-header cart text-primary fw-bold">Thông tin đơn hàng</div>
         <div class="card-body">
             <li class="font-weight-normal">Mã đơn hàng: <span class="fw-bold">UTP-<?= $id_bill ?></span></li>
             <li class="font-weight-normal">Thời gian đặt hàng: <span class="fw-bold"><?= $order_date ?></span></li>
             <li class="font-weight-normal">Tổng thành tiền: <span class="fw-bold"><?= number_format($total_amount) ?>₫</span></li>
             <li class="font-weight-normal">Trạng thái: <span class="fw-bold"><?php if ($status_pay == 1) {
                                                                                    echo "Đã thanh toán";
                                                                                } else {
                                                                                    echo "Chưa thanh toán";
                                                                                } ?></span></li>

         </div>
     </div>
     <!-- thông tin đặt hàng -->
     <form action="index.php?act=billconfirm" method="post">
         <div class="card">
             <div class="card-header cart text-primary fw-bold">Thông tin đặt hàng</div>
             <div class="card-body">
                 <div class="wrap-infocart mar-t5">
                     <span>Tài khoản người dùng: </span>
                     <input name="user_name" type="text" class="ip-cart ml-60 fw-bold" value="<?= $user_name ?>" disabled />
                 </div>
                 <div class="wrap-infocart mar-t5">
                     <span>Họ tên người đặt: </span>
                     <input name="full_name" type="text" class="ip-cart ml-91 fw-bold" value="<?= $full_name ?>" readonly />
                 </div>
                 <div class="wrap-infocart mar-t5">
                     <span>Địa chỉ: </span>
                     <input name="address" type="text" class="ip-cart ml-158 fw-bold" value="<?= $address ?>" readonly />
                 </div>
                 <div class="wrap-infocart mar-t5">
                     <span>Email: </span>
                     <input name="email" type="email" class="ip-cart ml-166 fw-bold" value="<?= $email ?>" readonly />
                 </div>
                 <div class="wrap-infocart mar-t5">
                     <span>Điện thoại: </span>
                     <input name="phone" type="text" class="ip-cart ml-134 fw-bold" value="0<?= $phone ?>" readonly />
                 </div>
             </div>
         </div>
         <!-- phương thức thanh toán -->
         <div class="card mt-4 mb-4">
             <div class="card-header cart text-primary fw-bold">Phương thức thanh toán</div>
             <div class="card-body">
                 <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="payment" id="inlineRadio1" checked>
                     <span class="text-primary fw-bold"><?php if ($payment == 1) {
                                                            echo "Thanh toán khi nhận hàng ";
                                                        } else if ($payment == 2) {
                                                            echo "Chuyển khoản ngân hàng";
                                                        } else if ($payment == 3) {
                                                            echo "Thanh toán Online";
                                                        } else {
                                                            echo "Không tìm thấy phương thức thanh toán";
                                                        }  ?></span>
                 </div>
             </div>
         </div>
         <!-- Begin JB's Cart Area -->
         <div class="card jb-cart-area">
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <div class="table-content table-responsive">
                             <?php cart_detail($cart_detail); ?>
                             <div class="wrap-btn-order mt-4">
                                 <a href="index.php?act=product" class="btn btn-secondary text-white">Xem thêm sản phẩm <i class="fa-solid fa-magnifying-glass"></i></a>
                             </div>
     </form>
     </div>
     </div>
     </div>
     </div>
     <!-- JB's Cart Area End Here -->
     </form>
 </article>