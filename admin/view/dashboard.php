<?php include_once "header.php" ?>
<?php $listuser = loadall_user();
$listcmt = loadall_cmt();
$listbill = loadall_bill(0);
$listpro = loadall_pro();
$ds_loai = loadall_loai(); ?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include_once "nav.php" ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Bảng điều khiển</h1>
                
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng doanh thu(Ngày)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format(ngay())  ?> đ</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tổng doanh thu(Tuần)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format(tuan())  ?> đ</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tổng doanh thu(Tháng)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format(thang())  ?> đ</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng doanh thu(năm)</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= number_format(nam())  ?> đ</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng đơn</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= count($listbill) ?></div>
                                        </div>
                                        <!-- <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tổng khách hàng</div>

                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($listuser); ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tổng sản phẩm</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($listpro) ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-brands fa-product-hunt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng loại sản phẩm</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($ds_loai) ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-weight-hanging fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Content Row -->

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Biểu đồ thống kê Doanh thu </h6>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>
                            <?php $thang = 12;
                            $dau1  ?>
                            const ctx = document.getElementById('myChart');

                            new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [
                                        'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
                                    ],
                                    datasets: [{
                                        label: 'Tháng',
                                        data: [
                                            <?php for ($i = 1; $i <= $thang; $i++) {
                                                $a = tungthang($i);
                                                if ($i == $thang) {
                                                    $dau1 = "";
                                                } else {
                                                    $dau1 = ",";
                                                };
                                            ?>
                                                <?= $a ?> <?= $dau1 ?>
                                            <?php
                                            } ?>
                                        ],
                                        fill: false,
                                        tension: 0.1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Thống kê danh mục</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="pieChart" ></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>


                        <script type="text/javascript">
                            <?php $all = thonngke();
                            $dem = count($all);
                            $i = 1; ?>


                            var donutData = {
                                labels: [
                                    <?php foreach ($all as $value) { ?> '<?= $value['name_cate'] ?>',
                                    <?php
                                    } ?>
                                ],
                                datasets: [{
                                    data: [
                                        <?php foreach ($all as $valuee) {
                                            if ($i == $dem) {
                                                $dau = "";
                                            } else {
                                                $dau = ",";
                                            }; ?>
                                            <?= $valuee['sluong'] ?><?= $dau ?>
                                        <?php $i++;
                                        } ?>
                                    ],
                                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8db2', '#d2d6de', '#6610f2', '#3d9970', '#001f3f'],
                                }]
                            }
                            //-------------
                            //- PIE CHART -
                            //-------------
                            // Get context with jQuery - using jQuery's .get() method.
                            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
                            var pieData = donutData;
                            var pieOptions = {
                                maintainAspectRatio: false,
                                responsive: true,
                            }
                            //Create pie or douhnut chart
                            // You can switch between pie and douhnut using the method below.
                            new Chart(pieChartCanvas, {
                                type: 'pie',
                                data: pieData,
                                options: pieOptions
                            })
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <!-- End of Main Content -->
    <?php include_once "footer.php" ?>