<?php
if (is_array($one_bill)) {
  extract($one_bill);
}
?>

<div id="layoutSidenav_content" class="container-fluid">
    <div class="container-fluid mt-3">
        <div>
            <h3 class="alert alert-success">Cập nhật hóa đơn</h3>
        </div>
        <div class="form-addcate">
            <form action="./index.php?act=updatebill" method="post">
                <div class="form-group mt-3">
                    <label for="formGroupExampleInput" class="font-lb">Mã hóa đơn</label>
                    <input type="text" name="id_bill" class="form-control" value="<?= $id_bill ?>" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="formGroupExampleInput" class="font-lb">Người đặt</label>
                    <input type="text" name="user_name" class="form-control" placeholder="Mã sản phẩm"
                        value="<?= $user_name ?>" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="formGroupExampleInput" class="font-lb">Mã sản phẩm</label>
                    <input type="text" name="id_pro" class="form-control" placeholder="Mã sản phẩm"
                        value="<?= $id_pro ?>" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="formGroupExampleInput" class="font-lb">Tên sản phẩm</label>
                    <input type="text" name="name_pro" class="form-control" placeholder="Tên sản phẩm"
                        value="<?= $name_pro ?>" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="formGroupExampleInput" class="font-lb">Ngày đặt</label>
                    <input type="text" name="order_date" class="form-control"
                        placeholder="Ngày đặt hàng" value="<?= $order_date ?>" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="formGroupExampleInput" class="font-lb">Thành tiền</label>
                    <input type="text" name="total_amount" class="form-control" placeholder="Tổng thành tiền sản phẩm"
                        value="<?= number_format($total_amount)?>" disabled>
                </div>
                <div class="form-group mt-3">
                    <label for="formGroupExampleInput" class="font-lb">Phương thức thanh toán</label>
                    <input type="text" name="payment" class="form-control" placeholder="Phương thức thanh toán"
                        value="<?php if ($payment == 1) {
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
              <label for="formGroupExampleInput" class="font-lb">Trạng thái</label>
              <select required class="form-control" name="status" id="">
               <option value="0" <?= $status == 0 ? "selected" : ""?>>Đơn hàng mới</option>
               <option value="1" <?= $status == 1 ? "selected" : ""?>>Đang xử lý</option>
               <option value="2" <?= $status == 2 ? "selected" : ""?>>Đang giao hàng</option>
               <option value="3" <?= $status == 3 ? "selected" : ""?>>Đã giao hàng</option>
              </select>
            </div>

                <div class="wrap-btn">
                    <input type="hidden" name="id_bill" class="form-control" value="<?= $id_bill?>">
                    <input type="submit" name="btn_update" class="btn btn-success mt-3" value="Cập nhật">
                    <input type="reset" class="btn btn-danger mt-3" value="Nhập lại">
                </div>
            </form>
        </div>
        <div class="pb-70"></div>