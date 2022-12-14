<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";

$idpro = $_REQUEST['idpro'];
$listcmt = loadall_comment($idpro);
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
<?php
        if (isset($_POST['btn_cmt']) && $_POST['btn_cmt']) {
            $content = $_POST['content_cmt'];
            $idpro = $_POST['idpro'];
            $id_user = $_SESSION['user']['id_user'];
            $user_name = $_SESSION['user']['user_name'];
            $full_name = $_SESSION['user']['full_name'];
            $comment_date = date("m/d/Y h:i:sa");
            if ($content == null) {
                echo '<script>alert("không được để trống !")</script>';
            } else {
                insert_comment($content, $id_user, $user_name, $full_name, $idpro, $comment_date);
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }
        ?>
    <div class="product_comments_block">
        <?php foreach ($listcmt as $cmt) : extract($cmt); ?>
            <div class="comment_details same-stuff">
                <span class="user-id"><?= $full_name ?> (<?= $user_name ?>)</span>
                <em class="user-comment"><?= $content ?></em>
                <em><?= $comment_date ?></em>
            </div>
        <?php endforeach ?>
        <!-- Form bình luận-->
       
        <div class="comment-btn-area mt-3">
        <?php if(isset($_SESSION['user'])){ ?>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                <textarea name="content_cmt" class="area-cmt" cols="60" rows="3" placeholder="Nhập bình luận của bạn" required></textarea> <br>
                <input type="hidden" name="idpro" value="<?= $idpro ?>">
                <input type="submit" name="btn_cmt" class="ip-cmt" value="Gửi">
            </form>
            <?php }else {?>
                            <div>
                                <p class="alert alert-primary fs-6">Vui lòng đăng nhập để bình luận !</p>
                            </div>
                        <?php } ?>
        </div>
        
        <!-- End bình luận -->
    </div>
    <script src="./src/js/plugins.min.js"></script>
    <script src="./src/js/ajax-mail.js"></script>
    <script src="./src/js/main.js"></script>
</body>

</html>