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
<?php  ?>
<!--end phần active trang đang được hiển thị-->
<!-- Begin JB's Cart Area -->
<div class="jb-cart-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="index.php?act=bill" method="post">
                    <div class="table-content table-responsive">
                        <?php if (!empty($_SESSION['mycart'])) {
                            $total_amount = 0;
                            $i = 0;
                            $removepro = "index.php?act=removecart&idcart=" . $i;
                            $prodetail = "index.php?act=prodetail&idpro=" . $cart[0];
                        ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="jb-product-thumbnail">Hình ảnh</th>
                                        <th class="cart-product-name">Sản phẩm</th>
                                        <th class="jb-product-price">Đơn giá</th>
                                        <th class="jb-product-quantity">Số lượng</th>
                                        <th class="jb-product-subtotal">Thành tiền</th>
                                        <th class="jb-product-remove">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($_SESSION['mycart'] as $key => $cart) {
                                        $total_amount = $total_amount + $cart[5]; ?>
                                        <tr>
                                            <!-- <input type="hidden" id="code" value="<?= $key ?>"> -->
                                            <td class="jb-product-thumbnail"><a href="<?= $prodetail ?>"><img src="admin/uploads/<?= $cart[2] ?>" alt="Ultraphone Product" width="80px"></img></a></td>
                                            <td class="jb-product-name"><a href="<?= $prodetail ?>"> <?= $cart[1] ?> </a></td>
                                            <td class="jb-product-price"><span class="amount"><?= number_format($cart[3])  ?> ₫</span></td>
                                            <td class="quantity">
                                                <div style="margin: 0 auto;width: 76px;">
                                                    <input type="number" style=" border: 1px solid #e5e5e5;  height: 46px;text-align: center; width: 48px; width: 48px;width: 3rem;background: #ffffff; " name="quantity" id="<?= $key ?>" value="<?= $cart[4] ?>" onchange="saveCart(this);" />
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span class="amount"> <?= number_format($cart[5]) ?> ₫</span></td>
                                            <td class="jb-product-remove"><a href="<?= $removepro ?>"><i class="fa fa-trash" title="Remove"></i></a></td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <a href="index.php?act=removecart"><input class="button" name="apply_coupon" value="Xóa toàn bộ sản phẩm" type="button"></a>
                                </div>
                                <div class="coupon2">
                                    <a href="index.php?act=product"><input type="button" class="button" value="Xem thêm sản phẩm"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Tổng giỏ hàng</h2>
                                <ul>
                                    <li>Tổng thành tiền : <span><?= number_format($total_amount) ?> ₫</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
            </div>
        </div>
    </div>
</div>
<script>
    function aler() {
        alert("Problen in sending reply!")
    }

    function saveCart(obj) {
        var quantity = $(obj).val();
        // var code = document.getElementById("code").value;
        var code = $(obj).attr("id");

        $.ajax({
            url: "?act=edit",
            type: "POST",
            data: 'quantity=' + quantity + '&code=' + code,
            success: function(data, status) {
                location.reload();
            },
            error: function() {
                alert("Problen in sending reply!")
            }
        });
    }
</script>