<div id="layoutSidenav_content">   
                    <div class="container-fluid px-4">
                        <div class="card mb-4 mt-4">
                            <div class="card-header">
                                <i class="fa-solid fa-chart-simple"></i>
                                Thống kê sản phẩm theo loại
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
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
                                    <tfoot>
                                        <tr>
                                            <th>Mã loại</th>
                                            <th>Tên loại</th>
                                            <th>Số lượng sản phẩm</th>
                                            <th>Giá thấp nhất</th>
                                            <th>Giá cao nhất</th>
                                            <th>Giá trung bình</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($liststatis as $statis) : extract($statis);?>
                                        <tr>
                                            <td><?= $idcate ?></td>
                                            <td><?= $namecate ?></td>
                                            <td><?= $pro_quantity ?></td>
                                            <td><?= number_format($min_price)?>₫</td>
                                            <td><?= number_format($max_price)?>₫</td>
                                            <td><?= number_format($avg_price)?>₫</td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        