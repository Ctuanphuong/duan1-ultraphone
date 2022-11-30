<?php

require_once "controller/controller.php";

//include dao để dùng các functione: 

include "model/pdo.php";
include "model/loai.php";
include "model/sanpham.php";
include "model/nguoidung.php";
include "model/hoadon.php";
include "model/binhluan.php";
include "model/thongke.php";
// controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case '/':

        case 'dashboard':
            render('dashboard');
            break;

            // CONTROLLER LOẠI:
        case "add_category":
            if (isset($_POST['btn_add']) && ($_POST['btn_add'])) {
                $name_cate = $_POST['name_cate'];
                them_loai($name_cate);
                echo '<script>alert("Thêm loại thành công!")</script>';
            }
            render('add_category');
            break;
        case "list_category":
            $ds_loai = loadall_loai();
            render(
                'list_category',
                ['ds_loai' => $ds_loai]
            );
            break;
        case "edit_category":
            if (isset($_GET['id_cate']) && ($_GET['id_cate'] > 0)) {
                $id_cate = $_GET['id_cate'];
                $one_loai = loadone_loai($id_cate);
            }
            render(
                'update_category',
                ['one_loai' => $one_loai]
            );
            break;
        case "update_category":
            if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                $id_cate = $_POST['id_cate'];
                $name_cate = $_POST['name_cate'];
                capnhat_loai($id_cate, $name_cate);
                echo '<script>alert("Cập nhật loại thành công!")</script>';
            }
            header('location:index.php?act=list_category');
            break;
        case "delete_cate":
            if (isset($_GET['id_cate']) && ($_GET['id_cate'] > 0)) {
                $id_cate = $_GET['id_cate'];
                xoa_loai($id_cate);
            }
            header('location:index.php?act=list_category');
            break;

            // CONTROLLER SẢN PHẨM:
        case "add_product":
            if (isset($_POST['btn_add']) && ($_POST['btn_add'])) {
                // $id_pro = $_POST['id_pro'];
                $name_pro = $_POST['name_pro'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $short_des = $_POST['short_des'];
                $detail_des = $_POST['detail_des'];
                $idcate = $_POST['idcate'];
                $img_pro = $_FILES['img_pro']['name'];
                $target_dir = "./uploads/";
                $target_file = $target_dir . basename($_FILES["img_pro"]["name"]);
                (move_uploaded_file($_FILES["img_pro"]["tmp_name"], $target_file));
                add_pro($name_pro, $price, $discount, $img_pro, $short_des, $detail_des, $idcate);
                echo '<script>alert("Thêm sản phẩm thành công!")</script>';
            }
            $ds_loai = loadall_loai();
            render(
                'add_product',
                ['ds_loai' => $ds_loai]
            );
            break;
        case "list_product":
            if (isset($_POST['btn_filter']) && ($_POST['btn_filter'])) {
                $idcate = $_POST['idcate'];
            } else {
                $idcate = 0;
            }
            $ds_loai = loadall_loai();
            $listpro = loadall_pro($idcate);
            render(
                "list_product",
                ['ds_loai' => $ds_loai, 'listpro' => $listpro]
            );
            break;
        case "edit_product":
            if (isset($_GET['id_pro']) && $_GET['id_pro'] > 0) {
                $id_pro = $_GET['id_pro'];
                $pro = loadone_pro($id_pro);
            }

            $ds_loai = loadall_loai();
            render(
                'update_product',
                ['ds_loai' => $ds_loai, 'pro' => $pro]
            );
            break;
        case "update_product":
            if (isset($_POST['btn_update']) && $_POST['btn_update'] > 0) {
                $id_pro = $_POST['id_pro'];
                $idcate = $_POST['idcate'];
                $name_pro = $_POST['name_pro'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $short_des = $_POST['short_des'];
                $detail_des = $_POST['detail_des'];
                $img_pro = $_FILES['img_pro']['name'];
                $target_dir = "./uploads/";
                $target_file = $target_dir . basename($_FILES["img_pro"]["name"]);
                (move_uploaded_file($_FILES["img_pro"]["tmp_name"], $target_file));
                update_pro($id_pro, $name_pro, $price, $discount, $short_des, $detail_des, $img_pro, $idcate);
                echo '<script>alert("Cập nhật sản phẩm thành công!")</script>';
                header('location:index.php?act=list_product');
            }
            break;
        case "delete_product":
            if (isset($_GET['id_pro']) && ($_GET['id_pro']) > 0) {
                $id_pro = $_GET['id_pro'];
                remove_pro($id_pro);
            }
            header('location:index.php?act=list_product');

            break;

            // CONTROLLER NGƯỜI DÙNG: 
            // danh sách người dùng
        case 'list_user':
            $listuser = loadall_user();
            render(
                'list_user',
                ['listuser' => $listuser]
            );
            break;
            // chỉnh sửa user
        case 'edituser':
            if (isset($_GET['id_user']) && ($_GET['id_user'] > 0)) {
                $id_user = $_GET['id_user'];
                $user = loadone_user($id_user);
            }
            include "view/nguoidung/update.php";
            break;
        case 'updateuser':
            if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                $id_user = $_POST['id_user'];
                $user_name = $_POST['user_name'];
                $full_name = $_POST['full_name'];
                $email_user = $_POST['email_user'];
                $password = $_POST['password'];
                $role = $_POST['role'];
                update_user($id_user, $user_name, $full_name, $email_user, $password, $role);
                echo '<script>alert("Cập nhật tài khoản thành công!")</script>';
            }
            $listuser = loadall_user();
            include "view/nguoidung/list.php";
            break;
            // Xóa người dùng
        case "removeuser":
            if (isset($_GET['id_user']) && ($_GET['id_user'] > 0)) {
                $id_user = $_GET['id_user'];
                delete_user($id_user);
            }
            $listuser = loadall_user();
            include "view/nguoidung/list.php";
            break;

            //CONTROLLER HÓA ĐƠN

            // show all bill
        case 'list_bill':
            $listbill = loadall_bill(0);
            render(
                'list_bill',
                ['listbill' => $listbill]
            );
            break;
            //     xóa bill: 
            // case 'removebill':
            //     if (isset($_GET['idbill']) && ($_GET['idbill'])) {
            //         $idbill = $_GET['idbill'];
            //         remove_bill($idbill);
            //     }
            //     $listbill = loadall_bill(0);
            //     include "view/hoadon/list.php";
            //     break;
        case 'editbill':
            if (isset($_GET['idbill']) && ($_GET['idbill']) > 0) {
                $idbill = $_GET['idbill'];
                $one_bill = loadone_bill($idbill);
            }
            include "view/hoadon/update.php";
            break;
        case 'updatebill':
            if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                $id_bill = $_POST['id_bill'];
                $status = $_POST['status'];
                update_bill($id_bill, $status);
                echo '<script>alert("Cập nhật đơn hàng thành công!")</script>';
            }
            $listbill = loadall_bill(0);
            include "view/hoadon/list.php";
            break;

            //CONTROLLER BÌNH LUẬN
            //show list: 
        case 'listcmt':
            $listcmt = loadall_cmt();
            include "view/binhluan/list.php";
            break;
            //xóa bình luận: 
        case 'removecmt':
            if (isset($_GET['idcmt']) && ($_GET['idcmt']) > 0) {
                $id_cmt = $_GET['idcmt'];
                remove_cmt($id_cmt);
            }
            $listcmt = loadall_cmt();
            include "view/binhluan/list.php";
            break;

            //CONTROLLER THỐNG KÊ
            //list thống kê: 
        case 'list_statis':
            $liststatis = loadall_statis();
            render(
                'list_statistic',
                ['liststatis' => $liststatis]
            );
            break;

        default:
            include "view/dashboard.php";
            break;
    }
}
