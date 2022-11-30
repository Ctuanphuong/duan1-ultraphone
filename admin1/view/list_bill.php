    <?php include_once "header.php" ?>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <?php include_once "nav.php" ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Hóa Đơn</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Mã hóa đơn</th>
                                        <th>Người đặt</th>
                                        <th>Ngày đặt</th>
                                        <th>Thành tiền</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Mã hóa đơn</th>
                                        <th>Người đặt</th>
                                        <th>Ngày đặt</th>
                                        <th>Thành tiền</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($listbill as $bill) :
                                        extract($bill);
                                        $user_detail = '' . $bill['user_name'] . '<br>' . $bill['full_name'] . '<br> ' . $bill['email'] . '<br> ' . $bill['address'] . '<br>0' . $bill['phone'] . '<br> 
                                        </td>'
                                    ?>
                                        <tr>
                                            <td><?= $bill['id_bill'] ?></td>
                                            <td><?= $bill['full_name'] ?></td>
                                            <td><?= $bill['order_date'] ?></td>
                                            <td><?= number_format($bill['total_amount']) ?></td>
                                            <td><?php if ($bill['payment'] == 1) {
                                                    echo "Thanh toán khi nhận hàng";
                                                } else if ($bill['payment'] == 2) {
                                                    echo "Chuyển khoản ngân hàng";
                                                } else if ($bill['payment'] == 3) {
                                                    echo "Thanh toán online";
                                                } else {
                                                    echo "Không tìm thấy phương thức thanh toán";
                                                }  ?></td>
                                            <td><?php if ($bill['status'] == 0) {
                                                    echo "Đơn hàng mới";
                                                } else if ($bill['status'] == 1) {
                                                    echo "Đang xử lý";
                                                } else if ($bill['status'] == 2) {
                                                    echo "Đang giao hàng";
                                                } else if ($bill['status'] == 3) {
                                                    echo "Đã giao hàng";
                                                } else {
                                                    echo "Lỗi trạng thái";
                                                } ?></td>
                                            <td class="text-center">
                                                <a href="index.php?act=edit_bill&idbill=<?= $bill['id_bill'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <script>
            $(document).ready(function() {
                $('#table1').DataTable();
            });
        </script>
        <!-- End of Main Content -->
        <?php include_once "footer.php" ?>