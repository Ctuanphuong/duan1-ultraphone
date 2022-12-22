<?php
session_start();
ob_start();
include "view/head.php";
include "model/pdo.php";
include "model/sanpham.php";
include "model/loai.php";
include "model/nguoidung.php";
include "model/giohang.php";
include "model/hoadon.php";
include "model/question.php";
include "email/index.php";

// kiểm tra session my cart đã tồn tại là 1 mảng chưa, nếu chưa thì khởi tạo 1 mảng mới
if (!isset($_SESSION['mycart']))
    $_SESSION['mycart'] = [];

//load sản phẩm trang client
$prohome = loadall_pro_home();

//load danh mục trang client
$listcate = loadall_cate();

//load 8 sản phẩm nổi bật
$list_topsp = loadall_pro_noibat();

//load sản phẩm bán chạy
$list_bestsp =  loadall_pro_best();

//Lấy lại mật khẩu
$mail = new Mailer();

include "view/header.php";

// kiểm tra có act tương ứng với key người dùng click không, nếu có act thì thực hiện các case 
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'product':
            if (isset($_POST['kyw']) && ($_POST['kyw']) != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = " ";
            }
            if (isset($_GET['idcate']) && ($_GET['idcate']) > 0) {
                $idcate = $_GET['idcate'];
            } else {
                $idcate = 0;
            }
            $listpro = loadall_pro($kyw, $idcate);
            $namecate = load_namecate($idcate);
            include "view/sanpham/sanpham.php";
            break;
        case 'prodetail':
            if (isset($_GET['idpro']) && $_GET['idpro'] > 0) {
                $id_pro = $_GET['idpro'];
                $one_pro = loadone_pro($id_pro);
                extract($one_pro);
                $similar_pro = similar_pro($id_pro, $idcate);
                include "view/sanpham/sanphamct.php";

                $seekey = 'post_' . $id_pro;
                error_reporting(0);
                $sessionView = $_SESSION[$seekey];
                error_reporting(E_ALL);
                if (!$sessionView) {
                    $_SESSION[$seekey] = "1";
                    updateview($id_pro);
                } else {
                    break;
                }
            } else {
                include "view/sanpham/sanpham.php";
            }
            break;

            // CONTROLLER ĐĂNG KÝ TÀI KHOẢN:

        case "register":
            if (isset($_POST['btn_register']) && $_POST['btn_register']) {
                $user_name = $_POST['user_name'];
                $full_name = $_POST['full_name'];
                $email_user = $_POST['email_user'];
                $password = $_POST['password'];
                register($user_name, $full_name, $email_user, $password);
               
                header("Location: index.php?act=login");
                echo '<script>alert("Đăng ký tài khoản thành công! Vui lòng đăng nhập")</script>';
            }
            include "view/nguoidung/register.php";
            break;
            // CONTROLLER ĐĂNG NHẬP TÀI KHOẢN:

        case "login":
            if (isset($_POST['btn_login']) && $_POST['btn_login']) {
                $user_name = $_POST['user_name'];
                $password = $_POST['password'];
                $check_user = check_user($user_name, $password);
                if (is_array($check_user)) {
                    $_SESSION['user'] = $check_user;
                    header('Location: index.php');
                    echo '<script>alert("Đăng nhập thành công!")</script>';
                } else {
                    echo '<script>alert("Tài khoản sai hoặc không tồn tại!")</script>';
                }
            }
            include "view/nguoidung/login.php";
            break;
            // đăng xuất tài khoản: 
        case 'logout':
            session_unset();
            header('Location: index.php?act=login');
            break;

            //Quên mật khẩu:
            //Form cách thức lấy lại mật khẩu
        case 'mk':
            include "view/nguoidung/cachthuclaymk.php";
            break;

            //Lấy lại mật khẩu thông qua User_name và Email_user
        case "usermk":
            if (isset($_POST['mk2']) && ($_POST['mk2'])) {
                $name = $_POST['user_name'];
                $email = $_POST['email'];
                $checkuser = check_pass($name, $email);
                if (is_array($checkuser)) {
                    $thongbao = '<p class="text-success"> Mật khẩu của tài khoản "' . $name . '" là: <span class="fw-bold">' . $checkuser['password'] . '</span></p>';
                } else {
                    $thongbao = '<p class="text-danger fw-bold">Tài khoản hoặc Email không tồn tại! Vui lòng kiểm tra lại</p>';
                }
            }
            include "view/nguoidung/laymk2.php";
            break;
            // Quên mật khẩu: Lấy lại mật khẩu thông qua mã xác nhận được gửi vào email
        case 'forgotPass':
            if (isset($_POST['btn_forgotPass'])) {
                $error = array();
                $email = $_POST['email'];
                if ($email == "") {
                    $error['email'] = 'Không để trống Email!';
                }
                if (empty($error)) {
                    $result = getUserEmail($email);
                    $code = substr(rand(0, 999999), 0, 6);
                    $title = "Tìm lại mật khẩu của bạn";
                    $content = "<p>Xin chào, chúng tôi đã nhận được yêu cầu đặt lại mật khẩu UltraPhone của bạn.<br>
                                Nhập mã sau đây để đặt lại mật khẩu: <span style='color: black; font-weight: 600'>" . $code . "</span></p>";
                    $mail->sendMail($title, $content, $email);
                    $_SESSION['mail'] = $email;
                    $_SESSION['code'] = $code;
                    header('Location: index.php?act=verification');
                }
            }
            include 'view/nguoidung/forgotpass.php';
            break;
            // Quên mật khẩu: Nhập mã xác minh mã được gửi qua Email
        case 'verification':
            include "view/nguoidung/verification.php";
            break;

            // Quên mật khẩu: Tạo mật khẩu mới để đăng nhập
        case 'changePass':
            if (isset($_POST['btn_changePass'])) {
                $error = array();
                $password = $_POST['newpass'];
                $email = $_SESSION['mail'];
                if ($_POST['repass'] != $_POST['newpass']) {
                    $error['fail'] = 'Nhập lại mật khẩu không khớp !';
                } else {
                    $user = forgetPass($password, $email);
                    //  echo '<script>alert("Đổi mật khẩu thành công! Vui lòng đăng nhập")</script>';
                    header("location: index.php?act=login");
                    $noti_success = "Đổi mật khẩu thành công! Vui lòng đăng nhập để mua hàng và thực hiện các chức năng khác.";
                }
            }
            include "view/nguoidung/changePass.php";
            break;

            // CONTROLLER THÔNG TIN TÀI KHOẢN: 
            // thông tin tài khoản
        case 'myaccount':
            if (isset($_SESSION['user'])) {
                if (isset($_POST['btn_change']) && ($_POST['btn_change'])) {
                    $id_user = $_POST['id_user'];
                    $full_name = $_POST['full_name'];
                    $user_name = $_SESSION['user']['user_name'];
                    $password = $_SESSION['user']['password'];
                    $sex = $_POST['sex'];
                    $email_user = $_POST['email_user'];
                    $address = $_POST['address'];
                    $phone_user = $_POST['phone_user'];
                    $img_user = $_FILES['img_user']['name'];
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["img_user"]["name"]);
                    move_uploaded_file($_FILES["img_user"]["tmp_name"], $target_file);
                    update_user($id_user, $img_user, $full_name, $sex, $email_user, $address, $phone_user);
                    $_SESSION['user'] = check_user($user_name, $password);
                    echo '<script>alert("Thay đổi thông tin thành công!")</script>';
                    // header("location: index.php?act=myaccount");
                }
                if (isset($_POST['btn_pass'])) {
                    $user_name = $_SESSION['user']['user_name'];
                    $password = $_POST['newpass'];
                    if ($password == "") {
                        echo '<script>alert("Không được để trống mật khẩu mới !")</script>';
                    } elseif ($_POST['repass'] != $_POST['newpass']) {
                        echo '<script>alert("Nhập lại mật khẩu không khớp !")</script>';
                    } else {
                        $pass = updatePass($user_name, $password);
                        echo '<script>alert("Đổi mật khẩu thành công !")</script>';
                    }
                }
            } else {
                header("Location: ?act=login");
            }
            $list_mybill = loadall_bill($_SESSION['user']['id_user']);
            include "view/nguoidung/myaccount.php";
            break;


            // CONTROLLER GIỎ HÀNG:   
            // xem giỏ hàng
        case 'viewcart':
            include "view/giohang/viewcart.php";
            break;
        case "edit":
            // $total_price = 0;
            foreach ($_SESSION['mycart'] as $k => $v) {
                if ($_POST["code"] == $k) {
                    if ($_POST["quantity"] == '0') {
                        array_splice($_SESSION['mycart'], $k, 1);
                    } else {
                        $_SESSION['mycart'][$k][4] = $_POST["quantity"];
                        $_SESSION['mycart'][$k][5] = $_SESSION['mycart'][$k][3] * $_SESSION['mycart'][$k][4];
                    }
                }
            }
            break;
            // thêm vào giỏ hàng
        case 'addtocart':
            if (isset($_POST['addtocart']) && $_POST['addtocart']) {
                $id_pro = $_POST['id_pro'];
                $name_pro = $_POST['name_pro'];
                $img_pro = $_POST['img_pro'];
                $price = $_POST['price'];
                $check = 0;
                if (isset($_POST['quatity']) && $_POST['quatity'] >= 1) {
                    $quantity = $_POST['quatity'];
                } else {
                    $quantity = 1;
                }
                foreach ($_SESSION['mycart'] as $k => $w) {
                    if ($id_pro == $_SESSION['mycart'][$k][0]) {
                        $sl = $_SESSION['mycart'][$k][4];
                        $_SESSION['mycart'][$k][4] = $sl + $quantity;
                        $_SESSION['mycart'][$k][5] = $_SESSION['mycart'][$k][3] * $_SESSION['mycart'][$k][4];
                        header("location: index.php?act=viewcart");
                        $check = 1;
                    }
                }
                if ($check == 0) {
                    $total = $price * $quantity;
                    $add_pro = [$id_pro, $name_pro, $img_pro, $price, $quantity, $total];
                    array_push($_SESSION['mycart'], $add_pro);
                    header("location: index.php?act=viewcart");
                }
            }
            include "view/giohang/viewcart.php";
            break;
            // xóa sản phẩm trong giỏ hàng
        case 'removecart':
            if (isset($_GET['idcart'])) {
                $idcart = $_GET['idcart'];
                array_splice($_SESSION['mycart'], $idcart, 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('location: index.php?act=viewcart');
            break;
            // tạo bill 
        case 'bill':
            if (isset($_SESSION['errorMessage'])) {
                echo "<script type='text/javascript'>
                        alert('" . $_SESSION['errorMessage'] . "');
                      </script>";
                unset($_SESSION['errorMessage']);
            }
            include "view/giohang/bill.php";
            break;
        case 'pay':
            include "view/qr.php";
            break;
        case 'billconfirm':
            if (isset($_POST['orderconfirm']) && ($_POST['orderconfirm'])) {
                if (isset($_SESSION['user'])) {
                    $randomNum = substr(str_shuffle("123456789"), 0, 5);
                    $bill_code = $randomNum;
                    $id_user = $_SESSION['user']['id_user'];
                    $user_name = $_SESSION['user']['user_name'];
                    $full_name = $_POST['full_name'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $payment = $_POST['payment'];
                    $order_date = date('Y/m/d h:i:s', time());
                    $check_error = 0;
                    $total_amount = total_amount();

                    function validate_mobile($mobile)
                    {
                        return preg_match('/^[0-9]{10}+$/', $mobile);
                    }
                    function validate_email($email)
                    {
                        return preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*.(\.[a-z]{2,4})$/',$email);
                    }
                    if (validate_mobile($phone) == 0) {
                        $_SESSION['errorMessage'] = "Email không hợp lệ !";
                        $check_error = 1;
                    } 
                    if (validate_mobile($phone) == 0) {
                        $_SESSION['errorMessage'] = "Số điện thoại không đúng định dạng !";
                        $check_error = 1;
                    }
                    if ($check_error == 0) {
                        if ($total_amount > 0) {
                            $_SESSION['idbill'] = $idbill = insert_bill($bill_code, $id_user, $user_name, $full_name, $address, $phone, $email, $payment, $order_date, $total_amount);
                            $result = getUserEmail($email);
                            $title = "Thông báo đặt hàng thành công!";
                            $content = "<h3>Xin chào, cảm ơn quý khách đặt hàng tại UltraPhone.<br></h3>
                            <h4>Thông tin người nhận:</h4>
                            <p>Tên khách hàng: " . $full_name . "</p>
                            <p>Email: " . $email . "</p>
                            <p>Địa chỉ: " . $address . "</p>
                            <p>Số điện thoại: " . $phone . "</p>
                            <p>Ngày đặt hàng: " . $order_date . "</p>
                            <p>Tổng tiền: " . number_format($total_amount) . "₫</p>
                            ";
                            $content .= "Chào mừng đến với  <a href='http://localhost/duan1-ultraphone/index.php'>UltraPhone! </a>";
                            $mail->sendMail($title, $content, $email);
                            $_SESSION['mail'] = $email;
                            header('location: ?act=viewbill');
                        } else {
                            header('location: ?act=viewcart');
                        }
                    } else {
                        header('location: ?act=bill');
                    }
                } else {
                    echo '<script>alert("Bạn phải đăng nhập để đặt hàng!")</script>';
                    header("location: index.php?act=login");
                    // include "view/giohang/viewcart.php";
                    break;
                }
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['user']['id_user'], $_SESSION['user']['user_name'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                }
                $_SESSION['mycart'] = [];
            }
            $bill = loadone_bill($_SESSION['idbill']);
            $cart_detail = loadall_cart($_SESSION['idbill']);
            error_reporting(0);

            if ($payment == 2 || $payment == 3) {
                $_SESSION['pay'] = [$payment, $total_amount, $bill_code];
                header('location: view/qr.php');
            } else {
                $_SESSION['check'] = 1;
            }
            error_reporting(E_ALL);
            unset($_SESSION['mycart']);
            if ($_SESSION['check'] == 1 || $payment == 1) {
                include "view/giohang/billconfirm.php";
            }
            break;

            // Hỏi đáp
        case 'question':
            if (isset($_POST['btn_question']) && ($_POST['btn_question'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $contennt = $_POST['contennt'];
                question($name, $email, $phone, $contennt);
                echo '<script>alert("Gửi câu hỏi thành công !")</script>';
            }
            include "view/hoidap/question.php";
            break;
        case 'viewbill':
            if (isset($_SESSION['user'])) {
                $randomNum = substr(str_shuffle("123456789"), 0, 5);
                $bill_code = $randomNum;
                $id_user = $_SESSION['user']['id_user'];
                $user_name = $_SESSION['user']['user_name'];
                // $full_name = $_POST['full_name'];
                // $address = $_POST['address'];
                // $phone = $_POST['phone'];
                // $email = $_POST['email'];
                // $payment = $_POST['payment'];
                $order_date = date('Y/m/d h:i:s', time());

                $total_amount = total_amount();

                if ($total_amount > 0) {
                    $_SESSION['idbill'] = $idbill = insert_bill($bill_code, $id_user, $user_name, $full_name, $address, $phone, $email, $payment, $order_date, $total_amount);
                    header('location: ?act=viewbill');
                }
            }
            foreach ($_SESSION['mycart'] as $cart) {
                insert_cart($_SESSION['user']['id_user'], $_SESSION['user']['user_name'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
            }
            $_SESSION['mycart'] = [];

            $bill = loadone_bill($_SESSION['idbill']);
            $cart_detail = loadall_cart($_SESSION['idbill']);
            error_reporting(0);

            if ($payment == 2 || $payment == 3) {
                $_SESSION['pay'] = [$payment, $total_amount, $bill_code];
                header('location: view/qr.php');
            } else {
                $_SESSION['check'] = 1;
            }
            error_reporting(E_ALL);
            if ($_SESSION['check'] == 1 || $payment == 1) {
                include "view/giohang/billconfirm.php";
            }
            break;

            include "view/giohang/viewbill.php";
            break;
                //Giới thiệu
            case 'introduce':
                include "view/gioithieu.php";
                break;
                //Liên hệ
            case 'contact':
                if (isset($_POST['btn_contact']) && ($_POST['btn_contact'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $contennt = $_POST['contennt'];
                    question($name, $email, $phone, $contennt);
                    echo '<script>alert("Gửi câu hỏi thành công !")</script>';
                }
                include "view/lienhe.php";
                break;
        default:
            include "view/content.php";
            break;
    }
} else {
    include "view/content.php";
}

include "view/footer.php";
ob_end_flush();
