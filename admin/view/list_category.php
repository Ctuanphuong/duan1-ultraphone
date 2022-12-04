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
                        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Sản Phẩm</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Mã loại</th>
                                        <th>Tên loại</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                    foreach ($ds_loai as $loai) : ?>
                                        <tr>
                                            <td><?= $loai['id_cate'] ?></td>
                                            <td><?= $loai['name_cate'] ?></td>
                                            <td class="text-center">
                                                <a href="index.php?act=edit_category&id_cate=<?= $loai['id_cate'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                                                <a href="index.php?act=delete_cate&id_cate=<?= $loai['id_cate'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="fa-solid fa-trash"></i> Xóa</a>
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