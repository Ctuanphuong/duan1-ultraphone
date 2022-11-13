<?php
include 'view/header.php';

//include dao để dùng các functione: 
include "model/pdo.php";
include "model/loai.php";
// controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            // CONTROLLER LOẠI:
        case "addl":
            if(isset($_POST['btn_add']) && ($_POST['btn_add'])) { 
                $name_cate = $_POST['name_cate'];
                them_loai($name_cate);
                $notice = "Thêm loại thành công !";
            }
            include "view/loai/add.php";
            break;
        case "listl":
            $ds_loai = loadall_loai();
            include "view/loai/list.php";
            break;
        case "sualoai": 
            if(isset($_GET['id_cate']) && ($_GET['id_cate'] > 0)) { 
                $id_cate = $_GET['id_cate'];
                $one_loai = loadone_loai($id_cate);
            }
            include "view/loai/update.php";
            break;
            case "capnhatloai": 
                if(isset($_POST['btn_update']) && ($_POST['btn_update'])) { 
                    $id_cate = $_POST['id_cate'];
                    $name_cate = $_POST['name_cate'];
                    capnhat_loai($id_cate, $name_cate);
                }
                $ds_loai = loadall_loai();
                include "view/loai/list.php";
                break;
                case "xoaloai": 
                    if(isset($_GET['id_cate']) && ($_GET['id_cate'] > 0)) { 
                    $id_cate = $_GET['id_cate'];
                    xoa_loai($id_cate);
                    }
                    $ds_loai = loadall_loai();
                    include "view/loai/list.php";
                    break;
            // CONTROLLER SẢN PHẨM:
        case "addsp":
            include "view/sanpham/add.php";
            break;
        case "listsp":
            include "view/sanpham/list.php";
            break;
        default:
            include "view/content.php";
            break;
    }
} else {
    include "view/content.php";
}


include 'view/footer.php';
