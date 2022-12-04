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
                    <h6 class="m-0 font-weight-bold text-primary">Thống Kê Sản Phẩm Theo Loại</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mã loại</th>
                                    <th>Tên loại</th>
                                    <th>Số lượng sản phẩm</th>
                                    <th>Giá thấp nhất</th>
                                    <th>Giá cao nhất</th>
                                    <th>Giá trung bình</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php foreach ($liststatis as $statis) : extract($statis); ?>
                                    <tr>
                                        <td><?= $idcate ?></td>
                                        <td><?= $namecate ?></td>
                                        <td><?= $pro_quantity ?></td>
                                        <td><?= number_format($min_price) ?></td>
                                        <td><?= number_format($max_price) ?></td>
                                        <td><?= number_format($avg_price) ?></td>
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
            $('#dataTable').DataTable();
        });
    </script>
    <!-- End of Main Content -->
    <?php include_once "footer.php" ?>