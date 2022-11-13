<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Danh sách loại điện thoại
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Mã loại</th>
                                <th>Tên loại</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Mã loại</th>
                                <th>Tên loại</th>
                                <th>Thao tác</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            foreach ($ds_loai as $loai) {
                                extract($loai);
                                $sualoai = "./index.php?act=sualoai&id_cate=" . $id_cate;
                                $xoaloai = "./index.php?act=xoaloai&id_cate=" . $id_cate;
                                echo ' <tr>        
                                <td>'.$id_cate.'</td>
                                <td>'.$name_cate.'</td>
                                <td class="text-center">
                                    <a href="'.$sualoai.'" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                                    <a href="'.$xoaloai.'" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa</a>
                                </td>
                            </tr>
                         ';
                            } 
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>