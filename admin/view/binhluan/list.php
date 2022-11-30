<div id="layoutSidenav_content">
                
                    <div class="container-fluid px-4">
                        <div class="card mb-4 mt-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách bình luận
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
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
                                    <tfoot>
                                        <tr>
                                            <th>Mã bình luận</th>
                                            <th>Người bình luận</th>
                                            <th>Sản phẩm</th>
                                            <th>Nội dung</th>
                                            <th>Ngày bình luận</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        foreach($listcmt as $cmt): extract($cmt); ?>
                                        <tr>
                                            <td><?= $id_cmt ?></td>
                                            <td><?= $user_name ?></td>
                                            <td><?= $name_pro ?></td>
                                            <td><?= $content ?></td>
                                            <td><?= $comment_date ?></td>
                                            <td class="text-center">
                                                <a href="index.php?act=removecmt&idcmt=<?= $id_cmt ?>"  class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa-solid fa-trash"></i> Xóa</a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            