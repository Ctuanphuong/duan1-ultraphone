<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li class="active">Thông tin tài khoản</li>
            </ul>
        </div>
    </div>
</div>
<!-- vùng endtrang chi tiết tài khoản-->

<!--nội dung -->
<main class="page-content">
    <form action="index.php?act=myaccount" method="post" enctype="multipart/form-data" class="jb-form">
        <? if (isset($_SESSION['user']) && is_array($_SESSION['user']))
            extract($_SESSION['user']);
        ?>
        <!-- Begin JB's Account Page Area -->
        <div class="account-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="account-dashboard-tab" data-bs-toggle="tab" href="#account-dashboard" role="tab" aria-controls="account-dashboard" aria-selected="true">Bảng điều khiển</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-orders-tab" data-bs-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">Đơn hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-address-tab" data-bs-toggle="tab" href="#account-address" role="tab" aria-controls="account-address" aria-selected="false">Địa chỉ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-details-tab" data-bs-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Thông tin tài khoản</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-password-tab" data-bs-toggle="tab" href="#account-password" role="tab" aria-controls="account-password" aria-selected="false">Mật khẩu</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?act=logout" class="nav-link" id="account-logout-tab" role="tab" aria-selected="false" onclick="return confirm('Bạn chắc chắc muốn đăng xuất tài khoản?')">Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                            <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
                                <div class="myaccount-dashboard">
                                    <p>Xin chào, <b><?= ($_SESSION['user']['full_name']) ?></b> (không phải <?= ($_SESSION['user']['full_name']) ?>? <a href="index.php?act=logout" onclick="return confirm('Bạn chắc chắc muốn đăng xuất tài khoản?')" style="font-weight: 600;">Đăng xuất</a>)</p>
                                    <p>Từ bảng điều khiển tài khoản của mình, bạn có thể xem các đơn đặt hàng gần đây, quản
                                        lý địa chỉ giao hàng và thanh toán cũng như chỉnh sửa mật khẩu và thông
                                        tin chi tiết tài khoản của mình.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
                                <div class="myaccount-orders">
                                    <h4 class="small-title">ĐƠN HÀNG CỦA TÔI</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Mã đơn hàng</th>
                                                    <th>Ngày đặt hàng</th>
                                                    <th>Số lượng</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tổng tiền</th>
                                                </tr>
                                                <?php 
                                               foreach($list_mybill as $bill) :
                                                extract($bill);  
                                                $stt = get_stt($status); 
                                                $countpro = loadall_countcart($id_bill);
                                                ?>
                                                <tr>
                                                    <td><a class="account-order-id" href="#">UTP-<?= $id_bill ?></a></td>
                                                    <td><?= $order_date ?></td>
                                                    <td><?= $countpro ?></td>
                                                    <td><?= $stt ?></td>
                                                    <td><?= number_format($total_amount)?>₫</td>
                                                </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-address" role="tabpanel" aria-labelledby="account-address-tab">
                                <div class="myaccount-address">
                                    <p>Địa chỉ của bạn được sử dụng để đặt và nhận hàng.</p>
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="small-title">Địa chỉ thanh toán</h4>
                                            <address>
                                                <?= ($_SESSION['user']['address']) ?>
                                            </address>
                                        </div>
                                        <div class="col">
                                            <h4 class="small-title">Địa chỉ nhận hàng</h4>
                                            <address>
                                                <?= ($_SESSION['user']['address']) ?>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                                <div class="myaccount-details">
                                    <div class="avt-user mb-3 text-center">
                                        <img src="uploads/<?= $_SESSION['user']['img_user'] ?>" alt="Avatar người dùng" style="border-radius: 100%; width: 100px; height: 100px; border: 1px solid #0084c5">
                                    </div>
                                    <div class="jb-form-inner">
                                        <div class="single-input">
                                            <label for="account-details-firstname">Ảnh đại diện</label>
                                            <input type="file" name="img_user" id="account-details-firstname">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-firstname">Tên đăng nhập</label>
                                            <input type="text" name="user_name" id="account-details-firstname" value="<?= $_SESSION['user']['user_name'] ?>" placeholder="Nhập họ tên của bạn" disabled>
                                        </div>
                                        <input type="hidden" name="password" id="account-details-firstname" value="<?= $_SESSION['user']['password'] ?>" disabled>

                                        <div class="single-input">
                                            <label for="account-details-firstname">Họ và tên</label>
                                            <input type="text" name="full_name" id="account-details-firstname" value="<?= $_SESSION['user']['full_name'] ?>" placeholder="Nhập họ tên của bạn">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="formGroupExampleInput">Giới tính</label>
                                            <select class="form-control" name="sex" required>
                                                <?php $sexarr = array('0' => 'Nam', '1' => 'Nữ'); ?>
                                                <?php foreach ($sexarr as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php echo $key ==  $_SESSION['user']['sex'] ? ' selected' : ''; ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-email">Email</label>
                                            <input type="email" name="email_user" id="account-details-email" value="<?= $_SESSION['user']['email_user'] ?>" placeholder="Nhập địa chỉ email của bạn">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-email">Địa chỉ</label>
                                            <input type="text" name="address" id="account-details-email" value="<?= $_SESSION['user']['address'] ?>" placeholder="Nhập địa chỉ nhận hàng của bạn">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-email">Số điện thoại</label>
                                            <input type="number" name="phone_user" id="account-details-email" value="<?= $_SESSION['user']['phone_user'] ?>" placeholder="Nhập số điện thoại nhận hàng của bạn">
                                        </div>
                                        <!-- <div class="single-input">
                                            <label for="account-details-oldpass">Mật khẩu hiện tại (Để trống nếu không
                                                thay đổi)</label>
                                            <input type="password" id="account-details-oldpass"
                                                placeholder="Nhập mật khẩu đang sử dụng">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-newpass">Mật khẩu mới (Để trống nếu không thay
                                                đổi)</label>
                                            <input type="password" id="account-details-newpass"
                                                placeholder="Nhập mật khẩu mới">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-confpass">Xác nhận mật khẩu mới</label>
                                            <input type="password" id="account-details-confpass"
                                                placeholder="Nhập lại mật khẩu mới">
                                        </div> -->
                                        <div class="col-12 wrap-btn-sub">
                                            <input type="hidden" name="id_user" value="<?= $_SESSION['user']['id_user'] ?>">
                                            <input type="submit" class="btn-submit mt-3" name="btn_change" value="Lưu thay đổi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-password" role="tabpanel" aria-labelledby="account-password-tab">
                                <div class="myaccount-details">
                                    <div class="jb-form-inner">
                                        <div class="single-input">
                                            <label for="account-details-firstname">Tên đăng nhập</label>
                                            <input type="text" name="user_name" id="account-details-firstname" value="<?= $_SESSION['user']['user_name'] ?>" placeholder="Nhập họ tên của bạn" disabled>
                                        </div>
                                        <div class="single-input">
                                            <label for="account-password-newpass">Mật khẩu mới </label>
                                            <input type="password" id="account-password-newpass" placeholder="Nhập mật khẩu mới" name="newpass">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-password-confpass">Xác nhận mật khẩu mới</label>
                                            <input type="password" id="account-password-confpass" placeholder="Nhập lại mật khẩu mới" name="repass">
                                        </div>
                                        
                                        <div class="col-12 wrap-btn-sub">
                                            <input type="hidden" name="id_user" value="<?= $_SESSION['user']['id_user'] ?>">
                                            <input type="submit" class="btn-submit mt-3" name="btn_pass" value="Lưu thay đổi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
<!-- JB's Page Content Area End Here -->