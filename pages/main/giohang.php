<p>Giỏ hàng:
<?php
    if(isset($_SESSION['dangky'])){
        echo '<span style="color:#8080ff">'.$_SESSION['dangky'].'</span>';
    }
?>
<?php
    if(isset($_SESSION['cart'])) {

    }
?>
</p>
<table style="width:100%; text-align: center; border-collapse: collapse;" border="1">
  <tr>
    <th>Id</th>
    <th>Mã sản phẩm</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>Hình ảnh</th>
    <th>Giá sản phẩm</th>
    <th>Thành tiền</th>
    <th>Hủy sản phẩm</th>
  </tr>
    <?php
    if(isset($_SESSION['cart'])) {
        $i = 0;
        $tongsotien = 0;
        foreach($_SESSION['cart'] as $cart_item) {
            $tien = $cart_item['soluong'] * $cart_item['giasanpham'];
            $tongsotien = $tongsotien + $tien;
            $i++;
    ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $cart_item['masanpham']; ?></td>
    <td><?php echo $cart_item['tensanpham']; ?></td>
    <td>
        <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id']?>"><i class="fa-solid fa-plus" style="color: black;
        background-color:#b3b3b3; border-radius: 5px"></i></a>
        <?php echo $cart_item['soluong'] ?>
        <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id']?>"><i class="fa-solid fa-minus" style="color: black;
        background-color:#b3b3b3; border-radius: 5px"></i></a>
    </td>
    <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" width="100px"></td>
    <td><?php echo number_format($cart_item['giasanpham'],0,',','.'). 'VNĐ' ?></td>
    <td><?php echo number_format($tien,0,',','.'). 'VNĐ'; ?></td>
    <td><a style="text-decoration: none; color: red;" href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id']?>">Xóa <i class="fa fa-trash" aria-hidden="true"></i></a></td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td colspan="8"><p style="float: left;">Tổng tiền thanh toán: <?php echo number_format($tongsotien,0,',','.'). ' VNĐ'?></p>
    <div style="clear: both;"></div>
    <?php
    if(isset($_SESSION['dangky'])){
      ?>
        <p><a style="text-decoration: none; margin:0 0 10px 50px; float: left; padding: 10px; font-size: 16px; background-color: #8080ff; color: white; border: none; border-radius: 5px;" href="index.php?quanly=thanhtoan">Đặt hàng</a></p>
    <?php
    }
    else {
    ?>
        <p><a style="text-decoration: none; float: left; margin:0 0 10px 50px; padding: 10.5px; font-size: 16px; background-color: #8080ff; color: white; border: none; border-radius: 5px;" href="index.php?quanly=dangky">Đặt hàng</a></p>
    <?php
    } 
    ?>
  </td>
  </tr>
  <?php
  }else {
  ?>
<tr>
    <td colspan="8">Giỏ trống</td>
</tr>
<?php
}
?>
</table>