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
                    <h6 class="m-0 font-weight-bold text-primary">Quản Lý hỏi đáp</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mã hỏi đáp</th>
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Nội dung</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                foreach ($listques as $ques) : extract($ques); ?>
                                    <tr>
                                        <td><?= $id_ques ?></td>
                                        <td><?= $name ?></td>
                                        <td><?= $email ?></td>
                                        <td><?= $phone ?></td>
                                        <td><?= $contennt ?></td>
                                        
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
