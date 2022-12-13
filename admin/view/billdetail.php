<?php include_once "header.php" ?>
<?php
if (is_array($one_bill)) {
    extract($one_bill);
}
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include_once "nav.php" ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div>
                <h3 class="alert alert-success">Chi tiết đơn hàng UTP-<?= $id_bill ?></h3>
            </div>
            <div class="card bg-light text-dark mb-4 mt-3">
                <div class="card-body">
                    <p>Mã hóa đơn: UTP-<?= $id_bill ?>
                    </p>
                    <p>Người đặt: <span class="fw-bold">
                            <?= $user_name ?>
                        </span></p>
                    <p>Họ tên: <?= $full_name ?>
                    </p>
                    <p>Email: <?= $email ?></p>
                    <p>Địa chỉ nhận hàng: <?= $address ?>
                    </p>
                    <p>Số điện thoại: 0<?= $phone ?></p>
                    <p>Ngày đặt: <?= $order_date ?>
                    </p>
                    <p>Thành tiền: <span class="text-dark font-weight-bold">
                            <?= number_format($total_amount) ?>₫
                        </span></p>
                    <p>Phương thức thanh toán:
                        <span class="text-primary fw-bold"> <?php if ($payment == 1) {
                                                                echo "Thanh toán khi nhận hàng";
                                                            } else if ($payment == 2) {
                                                                echo "Chuyển khoản ngân hàng";
                                                            } else if ($payment == 3) {
                                                                echo "Thanh toán online";
                                                            } else {
                                                                echo "Không tìm thấy phương thức thanh toán";
                                                            } ?></span>
                    </p>
                    <p>Trạng thái đơn hàng: <span class="text-warning fw-bold"><?php if ($status == 0) {
                                                                            echo "Đơn hàng mới";
                                                                        } else if ($status == 1) {
                                                                            echo "Đang xử lý";
                                                                        } else if ($status == 2) {
                                                                            echo "Đang giao hàng";
                                                                        } else if ($status == 3) {
                                                                            echo "Đã giao hàng";
                                                                        } 
                                                                        else if ($status == 4) {
                                                                            echo "Đã hủy";
                                                                        } 
                                                                        else {
                                                                            echo "Lỗi trạng thái";
                                                                        } ?>
                        </span>
                    </p>
                    <p>Trạng thái thanh toán: <?php if ($status_pay == 0) {
                                                    echo '<span class="text-danger">Chưa thanh toán</span>';
                                                } else if ($status_pay == 1) {
                                                    echo '<span class="text-success">Đã thanh toán</span>';
                                                } else {
                                                    echo "Không tìm thấy phương thức thanh toán";
                                                }  ?></p>
                </div>
            </div>

            <div class="table-content table-responsive mt-3 mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="jb-product-thumbnail">Hình ảnh</th>
                            <th class="cart-product-name">Sản phẩm</th>
                            <th class="jb-product-price">Đơn giá</th>
                            <th class="jb-product-quantity">Số lượng</th>
                            <th class="jb-product-subtotal">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = $_GET['idbill'];
                        $bill = load_cart_all($id);
                        // var_dump($bill);
                        foreach ($bill as $value) {
                        ?>
                            <tr>
                                <td class="jb-product-thumbnail"><img src="../admin/uploads/<?= $value['img_pro'] ?>" alt="Ultraphone Product" width="80px"></img></td>
                                <td class="jb-product-name">
                                    <?= $value['name_pro'] ?>
                                </td>
                                <td class="jb-product-price"><span class="amount">
                                        <?= number_format($value['price_pro']) ?>₫
                                    </span></td>
                                <td class="quantity">
                                    <?= $value['quantity'] ?>
                                </td>
                                <td class="product-subtotal"><span class="amount">
                                        <?= number_format($value['total_amount']) ?>₫
                                    </span></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="btn-function">
                <a href="index.php?act=listbill" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Quay lại
                    danh sách</a>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <?php include_once "footer.php" ?>