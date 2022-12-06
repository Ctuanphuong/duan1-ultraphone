<!-- phần active trang đang được hiển thị-->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li class="active">Giỏ hàng</li>
            </ul>
        </div>
    </div>
</div>
<!--end phần active trang đang được hiển thị-->
<!-- Begin JB's Cart Area -->
<div class="jb-cart-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="index.php?act=bill" method="post">
                    <div class="table-content table-responsive">
                        <?php if (!empty($_SESSION['mycart'])) { ?>
                            <?php viewcart(1); ?>
                            <div class="wrap-btn-order mt-4">
                                <input type="submit" href="index.php?act=bill" value="Xác nhận đặt hàng">
                            <?php } else { ?>
                                <h3 class="text-danger">Giỏ hàng trống. Vui lòng thêm sản phẩm để đặt hàng!</h3>
                                <div class="wrap-btn-order mt-4">
                                    <a href="index.php?act=product" class="btn btn-secondary text-white"><i class="fa-solid fa-plus"></i> Thêm sản phẩm</a>
                                </div>
                            <?php } ?>
                            </div>
                </form>
                <button onclick="aler()">test</button>
            </div>
        </div>
    </div>
</div>
<script>
    function aler(){
        alert("Hello! I am an alert box!!");
    }

</script>