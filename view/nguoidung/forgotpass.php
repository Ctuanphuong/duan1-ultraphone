<!-- phần active trang đang được hiển thị-->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li class="active">Quên mật khẩu</li>
            </ul>
        </div>
    </div>
</div>
<!--end phần active trang đang được hiển thị-->
<!-- show form đăng nhập và đăng ký-->
<div class="jb-login-register_area">
    <div class="container">
        <div class="row" style="justify-content: center;">
            <!-- form đăng ký -->
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="index.php?act=register" method="post">
                    <div class="login-form">
                        <h4 class="login-title">Tìm lại mật khẩu</h4>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <labe>Tên tài khoản</labe>
                                <input type="email" placeholder="Nhập tên tài khoản của bạn">
                            </div>
                            <div class="col-md-12 col-12">
                                <labe>Email</labe>
                                <input type="email" placeholder="Nhập địa chỉ email đăng ký">
                            </div>
                            <div class="col-12 wrap-btn-sub">
                                <input type="submit" class="btn-submit" name="btn_findpass" value="Tìm mật khẩu">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end show form đăng nhập và đăng ký -->