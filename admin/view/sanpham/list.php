<div id="layoutSidenav_content">

    <div class="container-fluid px-4">
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Danh sách sản phẩm
            </div>
            <div class="card-body">
                <div class="filter">
                    <form action="./index.php?act=listpro" method="POST" enctype="multipart/form-data">
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
                        <input type="submit" value="Filter" name="btn_filter" class="btn-filter">
                    </form>
                </div>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Hình ảnh</th>
                            <th>Mô tả</th>
                            <th>Lượt xem</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Hình ảnh</th>
                            <th>Mô tả</th>
                            <th>Lượt xem</th>
                            <th>Thao Tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($listpro as $pro) {
                            extract($pro);
                            $editpro = "./index.php?act=editpro&id_pro=" . $id_pro;
                            $removepro = "./index.php?act=removepro&id_pro=" . $id_pro;
                            $img_path = './uploads/' . $img_pro;
                            if (is_file($img_path)) {
                                $img_pro = '<img src=' . $img_path . ' alt="Ảnh sản phẩm" width="50px">';
                            } else {
                                $img_pro = 'No photo !';
                            }
                            echo ' <tr>
                                    <td>' . $id_pro . '</td>
                                    <td>' . $name_pro . '</td>
                                    <td>' . $price . '</td>
                                    <td>' . $img_pro . '</td>
                                    <td>' . $description . '</td>
                                    <td>' . $view . '</td>
                                    <td class="text-center">
                                        <a href="' . $editpro . '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                                        <a href="' . $removepro . '" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa</a>
                                    </td>
                                </tr>';
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>