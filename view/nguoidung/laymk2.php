<div class="jb-login-register_area">
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                <!-- form đăng nhập-->
                <form action="index.php?act=usermk" method="post">
                    <div class="login-form">
                        <h4 class="login-title">Quên mật khẩu</h4>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <labe>Tài khoản</labe>
                                <input type="text" name="user_name" placeholder="Nhập tên tài khoản ">
                            </div>
                            <div class="col-12 mb--20">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Nhập email của bạn">
                            </div>
                            <div class="col-md-10">
                                <div class="check-box">
                                    <a href="index.php?act=login">Đăng nhập </a>
                                </div>
                                <div class="register-txt">
                                    <a href="index.php?act=register">Đăng ký tài khoản mới</a>
                                </div>
                            </div>

                            <div class="col-12 wrap-btn-sub">
                                <input type="submit" class="btn-submit" name="mk2" value="Tìm mật khẩu" style="margin-top: 30px;">
                            </div>
                            <?php

                            if (isset($thongbao) && ($thongbao != "")) {
                                echo $thongbao;
                            }
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>