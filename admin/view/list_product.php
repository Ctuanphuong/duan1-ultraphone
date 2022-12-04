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
                        <div class="filter">
                            <form action="./index.php?act=list_product" method="POST">
                                <select name="idcate" class="sel-filter">
                                    <option value="0">Tất cả</option>
                                    <?php
                                    foreach ($ds_loai as $loai) {
                                        extract($loai);
                                        if ($idcate == $id_cate) {
                                            echo '<option value="' . $id_cate . '" selected>' . $name_cate . '</option>';
                                        } else {
                                            echo '<option value="' . $id_cate . '">' . $name_cate . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <input type="submit" value="Lọc" name="btn_filter" class="btn-filter">
                            </form>
                        </div>
                        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mã SP</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Giảm giá</th>
                                    <th>Hình ảnh</th>
                                    <th>Mô tả ngắn</th>
                                    <th>Mô tả chi tiết</th>
                                    <th>Lượt xem</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php foreach ($listpro as $pro) : ?>
                                    <tr>
                                        <td><?= $pro['id_pro'] ?></td>
                                        <td><?= $pro['name_pro'] ?></td>
                                        <td><?= number_format($pro['price']) ?></td>
                                        <td><?= $pro['discount'] ?>%</td>
                                        <td><img src="./uploads/<?= $pro['img_pro'] ?>" alt="No photo!" width="50px"></td>
                                        <td><?= $pro['short_des'] ?></td>
                                        <td><?= $pro['detail_des'] ?></td>
                                        <td><?= $pro['view'] ?></td>
                                        <td class="text-center">
                                            <a href="./index.php?act=edit_product&id_pro=<?= $pro['id_pro'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="./index.php?act=delete_product&id_pro=<?= $pro['id_pro'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="fa-solid fa-trash"></i></a>
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
        <script type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
    </div>
    <!-- End of Main Content -->
    <?php include_once "footer.php" ?>