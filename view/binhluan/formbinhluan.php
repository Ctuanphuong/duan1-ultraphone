<?php 
$idpro = $_REQUEST['idpro']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" media="screen" href="./src/css/plugins.min.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="./src/css/main.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="./src/css/footer.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="./src/css/dropdown.css" />
  <link rel="shortcut icon" type="./src/imagex-icon" href="./src/image/menu/logo/logo-url.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="product_comments_block">
        <div class="comment_details same-stuff">
            <span class="user-id">Phương</span>
            <div class="rating-box">
                <ul>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                </ul>
            </div>
            <em class="user-comment"><?= $idpro ?></em>
            <em>25/03/2022</em>
        </div>
        <div class="review-btn_area">
            <a class="review-btn" href="" data-bs-toggle="modal" data-bs-target="#mymodal">Đánh giá
                của bạn</a>
        </div>
        <!-- Form bình luận-->
        <div class="modal fade modal-wrapper quickview-feedback_form" id="mymodal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="review-page-title">Viết đánh giá của bạn</h3>
                        <div class="modal-inner-area row">
                            <div class="col-lg-6">
                                <div class="jb-review-product">
                                    <img src="admin/uploads/<?= $one_pro['img_pro']; ?>" alt="UltraPhone Product">
                                    <div class="jb-review-product-desc">
                                        <p class="jb-product-name"> <strong>
                                                <?= $one_pro['name_pro'] ?></strong></p>
                                        <p>
                                            <span> <?= $one_pro['short_des'] ?>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="jb-review-content">
                                    <!-- Begin Feedback Area -->
                                    <div class="feedback-area">
                                        <div class="feedback">
                                            <h3 class="feedback-title">Phản hồi</h3>
                                            <form action="#">
                                                <p class="your-opinion">
                                                    <label>Đánh giá</label>
                                                    <span>
                                                        <select class="star-rating">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </span>
                                                </p>
                                                <p class="feedback-form">
                                                    <label for="feedback">Bình luận</label>
                                                    <textarea id="feedback" name="comment"
                                                        placeholder="Nhập bình luận của bạn..." cols="45" rows="8"
                                                        aria-required="true"></textarea>
                                                </p>
                                                <div class="cmt-input">
                                                    <div class="feedback-inner_btn">
                                                        <!-- <a href="#">Gửi</a> -->
                                                        <input type="submit" name="btn_cmt" class="btn_cmt" value="Gửi">
                                                        <a href="#" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">Đóng</a>
                                                        <!-- <input type="button" name="btn_close" class="btn_close" value="Đóng"> -->
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Feedback Area End Here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End bình luận -->
    
</div>
<script src="./src/js/plugins.min.js"></script>
<script src="./src/js/ajax-mail.js"></script>
<script src="./src/js/main.js"></script>
</body>
</html>