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
                    <h6 class="m-0 font-weight-bold text-primary">Quản Lý Bình Luận</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mã bình luận</th>
                                    <th>Người bình luận</th>
                                    <th>Sản phẩm</th>
                                    <th>Nội dung</th>
                                    <th>Ngày bình luận</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                foreach ($listcmt as $cmt) : extract($cmt); ?>
                                    <tr>
                                        <td><?= $id_cmt ?></td>
                                        <td><?= $user_name ?></td>
                                        <td><?= $name_pro ?></td>
                                        <td><?= $content ?></td>
                                        <td><?= $comment_date ?></td>
                                        <td class="text-center">
                                            <a href="index.php?act=delete_cmt&idcmt=<?= $id_cmt ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa-solid fa-trash"></i> Xóa</a>
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
            $('#dataTable').DataTable();
        });
    </script>
    
    <!-- End of Main Content -->
    <?php include_once "footer.php" ?>