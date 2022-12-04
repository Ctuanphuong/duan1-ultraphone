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
                    <h6 class="m-0 font-weight-bold text-primary">Quản Lý Người Dùng</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mã User</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Vai trò</th>
                                    <!-- <th>Ngày đăng ký</th>
                            <th>Lần đăng nhập cuối</th> -->
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php foreach ($listuser as $user) : ?>
                                    <tr>
                                        <td><?= $user['id_user'] ?></td>
                                        <td><?= $user['user_name'] ?></td>
                                        <td><?= $user['full_name'] ?></td>
                                        <td><?= $user['email_user'] ?></td>
                                        <td><?php if ($user['role'] == 1) {
                                                echo "<span class='badge badge-danger'>Admin</span>";
                                            } else {
                                                echo "<span class='badge badge-success'>Thành Viên</span>
                                            ";
                                            } ?></td>
                                        <td class="text-center">
                                            <a href="./index.php?act=edit_user&id_user=<?= $user['id_user'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                                            <a href="./index.php?act=delete_usser&id_user=<?= $user['id_user'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="fa-solid fa-trash"></i> Xóa</a>
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