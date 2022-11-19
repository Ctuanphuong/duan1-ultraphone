<!-- vùng bắt đầu trang chi tiết tài khoản-->
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
    <!-- Begin JB's Account Page Area -->
    <div class="account-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="account-dashboard-tab" data-bs-toggle="tab"
                                href="#account-dashboard" role="tab" aria-controls="account-dashboard"
                                aria-selected="true">Bảng điều khiển</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-orders-tab" data-bs-toggle="tab" href="#account-orders"
                                role="tab" aria-controls="account-orders" aria-selected="false">Đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-address-tab" data-bs-toggle="tab" href="#account-address"
                                role="tab" aria-controls="account-address" aria-selected="false">Địa chỉ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-details-tab" data-bs-toggle="tab" href="#account-details"
                                role="tab" aria-controls="account-details" aria-selected="false">Thông tin tài khoản</a>
                        </li>
                        <li class="nav-item">
                            <a  href="index.php?act=logout" class="nav-link" id="account-logout-tab" role="tab"
                                aria-selected="false" onclick="return confirm('Bạn chắc chắc muốn đăng xuất tài khoản?')">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                        <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                            aria-labelledby="account-dashboard-tab">
                            <div class="myaccount-dashboard">
                                <p>Xin chào, <b>Anh Phương đẹp trai</b> (không phải Phương? <a
                                        href="index.php?act=logout" onclick="return confirm('Bạn chắc chắc muốn đăng xuất tài khoản?')" style="font-weight: 600;">Đăng xuất</a>)</p>
                                <p>Từ bảng điều khiển tài khoản của mình, bạn có thể xem các đơn đặt hàng gần đây, quản
                                    lý địa chỉ giao hàng và thanh toán cũng như chỉnh sửa mật khẩu và thông
                                        tin chi tiết tài khoản của mình.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-orders" role="tabpanel"
                            aria-labelledby="account-orders-tab">
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
                                                <th>Thao tác</th>
                                            </tr>
                                            <tr>
                                                <td><a class="account-order-id" href="#">#5364</a></td>
                                                <td>Mar 27, 2022</td>
                                                <td>10</td>
                                                <td>Đang xử lí</td>
                                                <td>3,000,000đ</td>
                                                <td><a href="#" class="jb-btn jb-btn_dark jb-btn_sm"><span>Xem chi
                                                            tiết</span></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-address" role="tabpanel"
                            aria-labelledby="account-address-tab">
                            <div class="myaccount-address">
                                <p>Địa chỉ của bạn được sử dụng để đặt và nhận hàng.</p>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="small-title">Địa chỉ thanh toán</h4>
                                        <address>
                                            136 Cầu Diễn, Minh Khai, Bắc Từ Liêm, Hà Nội.
                                        </address>
                                    </div>
                                    <div class="col">
                                        <h4 class="small-title">Địa chỉ nhận hàng</h4>
                                        <address>
                                            136 Cầu Diễn, Minh Khai, Bắc Từ Liêm, Hà Nội.
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-details" role="tabpanel"
                            aria-labelledby="account-details-tab">
                            <div class="myaccount-details">
                                <form action="#" class="jb-form">
                                    <div class="jb-form-inner">
                                        <div class="avt-user">
                                            <img src="./image/menu/logo/logo.png" alt="Avatar">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-firstname">Ảnh đại diện</label>
                                            <input type="file" id="account-details-firstname">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-firstname">Họ và tên</label>
                                            <input type="text" id="account-details-firstname"
                                                placeholder="Nhập họ tên của bạn">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-email">Email</label>
                                            <input type="email" id="account-details-email"
                                                placeholder="Nhập địa chỉ email của bạn">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-email">Địa chỉ</label>
                                            <input type="text" id="account-details-email"
                                                placeholder="Nhập địa chỉ nhận hàng của bạn">
                                        </div>
                                        <div class="single-input">
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
                                        </div>
                                        <div class="col-12 wrap-btn-sub">
                                            <input type="submit" class="btn-submit" name="btn_login"
                                                value="Lưu thay đổi" style="margin-top: 30px;">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JB's Account Page Area End Here -->
</main>
<!-- JB's Page Content Area End Here -->