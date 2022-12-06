<?php
function viewcart($removecol)
{
    $total_amount = 0;
    $i = 0;
    if ($removecol == 1) {
        $remove_th = '<th class="jb-product-remove">Thao tác</th>';
    } else {
        $remove_th = '';
    }
    echo '
 <table class="table"> 
 <thead>
<tr>    
 <th class="jb-product-thumbnail">Hình ảnh</th>
 <th class="cart-product-name">Sản phẩm</th>
 <th class="jb-product-price">Đơn giá</th>
 <th class="jb-product-quantity">Số lượng</th>
 <th class="jb-product-subtotal">Thành tiền</th>
 ' . $remove_th . '
</tr>
</thead>';

    foreach ($_SESSION['mycart'] as $cart) {
        $removepro = "index.php?act=removecart&idcart=" . $i;
        $img_pro = "admin/uploads/" . $cart[2];
        $prodetail = "index.php?act=prodetail&idpro=" . $cart[0];
        $quantity = $cart[4];
        $total = $cart[3] * $cart[4];
        $total_amount += $total;
        if ($removecol == 1) {
            $remove_td = '<td class="jb-product-remove"><a href="' . $removepro . '"><i class="fa fa-trash" title="Remove"></i></a></td>';
        } else {
            $remove_td = "";
        }
        echo '<tbody>
    <tr>
        <td class="jb-product-thumbnail"><a href="' . $prodetail . '"><img src="' . $img_pro . '" alt="Ultraphone Product" width="80px"></img></a></td>
        <td class="jb-product-name"><a href="' . $prodetail . '">' . $cart[1] . '</a></td>
        <td class="jb-product-price"><span class="amount">' . number_format($cart[3]) . '₫</span></td>
        <td class="quantity">
        <div style="margin: 0 auto;width: 76px;">
        <input type="number" style=" border: 1px solid #e5e5e5;  height: 46px;text-align: center; width: 48px; width: 48px;width: 3rem;background: #ffffff; "  value="' . $quantity . '" readonly />
    </div>
        </td>
        <td class="product-subtotal"><span class="amount">' . number_format($total) . '₫</span></td>
       ' . $remove_td . '
    </tr>
</tbody>';
        $i += 1;
    }
    if ($removecol == 1) {
        $btn_remove = '<a href="index.php?act=removecart"><input class="button" name="apply_coupon" value="Xóa toàn bộ sản phẩm" type="button"></a>';
    } else {
        $btn_remove = '';
    }
    if ($removecol == 1) {
        $btn_update = '<a href="index.php?act=product"><input type="button" class="button" value="Xem thêm sản phẩm"></a>';
    } else {
        $btn_update = '<a href="index.php?act=viewcart"><input type="button" class="button" value="Quay lại giỏ hàng"></a>';
    }

    echo '    
 </table>
</div>
<div class="row">
    <div class="col-12">
        <div class="coupon-all">
            <div class="coupon">
            ' . $btn_remove . '
            </div>
            <div class="coupon2">
            ' . $btn_update . '
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-5 ml-auto">
        <div class="cart-page-total">
            <h2>Tổng giỏ hàng</h2>
            <ul>
                <li>Tổng thành tiền <span>' . number_format($total_amount) . '₫</span></li>
            </ul>
        </div>
    </div>
</div>';
}
function cart_detail($listcart)
{
    $total_amount = 0;
    $i = 0;
    echo '
 <table class="table"> 
 <thead>
<tr>    
 <th class="jb-product-thumbnail">Hình ảnh</th>
 <th class="cart-product-name">Sản phẩm</th>
 <th class="jb-product-price">Đơn giá</th>
 <th class="jb-product-quantity">Số lượng</th>
 <th class="jb-product-subtotal">Thành tiền</th>
</tr>
</thead>';
    foreach ($listcart as $cart) {
        $img_pro = "admin/uploads/" . $cart['img_pro'];
        $prodetail = "index.php?act=prodetail&idpro=" . $cart['id_pro'];
        $total_amount += $cart['total_amount'];
        echo '<tbody>
    <tr>
        <td class="jb-product-thumbnail"><img src="' . $img_pro . '" alt="Ultraphone Product" width="80px"></img></td>
        <td class="jb-product-name"><a href="' . $prodetail . '">' . $cart['name_pro'] . '</a></td>
        <td class="jb-product-price"><span class="amount">' . number_format($cart['price_pro']) . '₫</span></td>
        <td class="quantity">' . $cart['quantity'] . '</td>
        <td class="product-subtotal"><span class="amount">' . number_format($cart['total_amount']) . '₫</span></td>
    </tr>
</tbody>';
        $i += 1;
    }
    echo '    
 </table>
</div>
<div class="row">
    <div class="col-md-5 ml-auto">
        <div class="cart-page-total">
            <h2>Tổng giỏ hàng</h2>
            <ul>
                <li>Tổng thành tiền <span>' . number_format($total_amount) . '₫</span></li>
            </ul>
        </div>
    </div>
</div>';
}

function countcart()
{
    $i = 0;
    foreach ($_SESSION['mycart'] as $k => $cart) {
        $i = $i + $_SESSION['mycart'][$k][4];
    }
    return $i;
}
function total_amount()
{

    $total_amount = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $total = $cart[3] * $cart[4];
        $total_amount += $total;
    }
    return $total_amount;
}
function insert_cart($id_user, $user_name, $id_pro, $img_pro, $name_pro, $price, $quantity, $total_amount, $idbill)
{
    $sql = "INSERT INTO cart(id_user, user_name, id_pro, img_pro, name_pro, price_pro, quantity, total_amount, id_bill) values ('$id_user','$user_name', '$id_pro', '$img_pro', '$name_pro', '$price', '$quantity', '$total_amount', '$idbill')";
    pdo_execute($sql);
}
function loadall_cart($idbill)
{
    $sql = "SELECT * FROM cart WHERE id_bill=" . $idbill;
    $listcart = pdo_query($sql);
    return $listcart;
}
function loadall_countcart($idbill)
{
    $sql = "SELECT * FROM cart WHERE id_bill=" . $idbill;
    $listcart = pdo_query($sql);
    return count($listcart);
}
