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
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                <!-- form đăng nhập-->
                <form action="index.php?act=mk" method="post">
                    <div class="login-form">
                        <h3 class="login-title">Cách thức lấy lại mật khẩu</h3>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <a href="index.php?act=forgotPass" class="text-primary fw-bold">Gửi mã qua email</a>
                            </div>
                            <div class="col-12 mb--20" style="margin-top: 20px;">
                                <a href="index.php?act=usermk" class="text-primary fw-bold">Thông qua tên đăng nhập và email</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>