<?php
include './view/header.php';

// controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {

            // CONTROLLER LOẠI:
        case "addl":
            include "./view/loai/add.php";
            break;
        case "listl":
            include "./view/loai/list.php";
            break;
            // CONTROLLER SẢN PHẨM:
        case "addsp":
            include "./view/sanpham/add.php";
            break;
        case "listsp":
            include "./view/sanpham/list.php";
            break;
        default:
            include "./view/content.php";
            break;
    }
}
else { 
    include "./view/content.php";      
}


include './view/footer.php';
