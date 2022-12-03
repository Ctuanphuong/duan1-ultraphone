<?php include_once "header.php" ?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include_once "nav.php" ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <?php
            if (is_array($one_bill)) {
                extract($one_bill);
            }
            ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cập nhật hóa đơn</h6>
                </div>
                <div class="card-body">
                    <div class="form-addcate">
                        <form action="./index.php?act=update_bill" method="post">
                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput" class="font-lb">Mã hóa đơn</label>
                                <input type="text" name="id_bill" class="form-control" value="<?= $id_bill ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput" class="font-lb">Người đặt</label>
                                <input type="text" name="user_name" class="form-control" placeholder="Mã sản phẩm" value="<?= $user_name ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput" class="font-lb">Địa chỉ nhận hàng</label>
                                <input type="text" name="user_name" class="form-control" placeholder="Mã sản phẩm" value="<?= $address ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput" class="font-lb">Ngày đặt</label>
                                <input type="text" name="order_date" class="form-control" placeholder="Ngày đặt hàng" value="<?= $order_date ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput" class="font-lb">Thành tiền</label>
                                <input type="text" name="total_amount" class="form-control" placeholder="Tổng thành tiền sản phẩm" value="<?= number_format($total_amount) ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput" class="font-lb">Phương thức thanh toán</label>
                                <input type="text" name="payment" class="form-control" placeholder="Phương thức thanh toán" value="<?php if ($payment == 1) {
                                                                                                                                        echo "Thanh toán khi nhận hàng";
                                                                                                                                    } else if ($payment == 2) {
                                                                                                                                        echo "Chuyển khoản ngân hàng";
                                                                                                                                    } else if ($payment == 3) {
                                                                                                                                        echo "Thanh toán online";
                                                                                                                                    } else {
                                                                                                                                        echo "Không tìm thấy phương thức thanh toán";
                                                                                                                                    }  ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput" class="font-lb">Thanh toán</label>
                                <select required class="form-control" name="status_pay" id="">
                                    <option value="0" <?= $status_pay == 0 ? "selected" : "" ?>>Chưa thanh toán</option>
                                    <option value="1" <?= $status_pay == 1 ? "selected" : "" ?>>Đã thanh toán</option>

                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput" class="font-lb">Trạng thái</label>
                                <select required class="form-control" name="status" id="">
                                    <option value="0" <?= $status == 0 ? "selected" : "" ?>>Đơn hàng mới</option>
                                    <option value="1" <?= $status == 1 ? "selected" : "" ?>>Đang xử lý</option>
                                    <option value="2" <?= $status == 2 ? "selected" : "" ?>>Đang giao hàng</option>
                                    <option value="3" <?= $status == 3 ? "selected" : "" ?>>Đã giao hàng</option>
                                    <option value="4" <?= $status == 4 ? "selected" : "" ?>>Đã hủy</option>

                                </select>
                            </div>

                            <div class="wrap-btn">
                                <input type="hidden" name="id_bill" class="form-control" value="<?= $id_bill ?>">
                                <input type="submit" name="btn_update" class="btn btn-success mt-3" value="Cập nhật">
                                <input type="reset" class="btn btn-danger mt-3" value="Nhập lại">
                            </div>
                        </form>
                    </div>
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Sản phẩm</h6>
                    </div>
                    <div class="table-content table-responsive">
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
                                        <td class="jb-product-name"><a href=""><?= $value['name_pro'] ?></a></td>
                                        <td class="jb-product-price"><span class="amount"><?= $value['price_pro'] ?> ₫</span></td>
                                        <td class="quantity"><?= $value['quantity'] ?></td>
                                        <td class="product-subtotal"><span class="amount"><?= $value['total_amount'] ?>₫</span></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <?php include_once "footer.php" ?>