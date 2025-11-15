<?php
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "<p>Giỏ hàng trống, không thể thanh toán.</p>";
}
?>

<?php
include __DIR__ . "/../../admincp/config/config.php";
if (isset($_POST['dathang'])) {
    $tennguoidat = $_SESSION['dangky'];
    $diachi = $_POST['diachi'];
    $sodienthoai = $_POST['sodienthoai'];

    foreach ($_SESSION['cart'] as $cart_item) {
        $tensanpham = $cart_item['tensanpham'];
        $soluong    = $cart_item['soluong'];
        $tongtien   = $cart_item['soluong'] * $cart_item['giasanpham'];

        $sql = "INSERT INTO tbl_donhang (tennguoidathang, tensanpham, soluong, Tongtien, diachinhanhang, sodienthoai) 
                VALUES ('$tennguoidat', '$tensanpham', '$soluong', '$tongtien', '$diachi', '$sodienthoai')";
        mysqli_query($mysqli, $sql);
    }

    unset($_SESSION['cart']);
    echo "<script>alert('Đặt hàng thành công!'); window.location.href = 'index.php?quanly=huydonhang';</script>";
}
?>

<h2 style="text-align:center;">Xác nhận đơn hàng</h2>
<table style="width:100%; text-align: center; border-collapse: collapse;" border="1">
  <tr>
    <th>Id</th>
    <th>Mã sản phẩm</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>Hình ảnh</th>
    <th>Giá sản phẩm</th>
    <th>Thành tiền</th>
  </tr>
  <?php
    $i = 0;
    $tongsotien = 0;
    foreach($_SESSION['cart'] as $cart_item) {
        $i++;
        $tien = $cart_item['soluong'] * $cart_item['giasanpham'];
        $tongsotien += $tien;
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $cart_item['masanpham']; ?></td>
    <td><?php echo $cart_item['tensanpham']; ?></td>
    <td><?php echo $cart_item['soluong']; ?></td>
    <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="100px"></td>
    <td><?php echo number_format($cart_item['giasanpham'],0,',','.').' VNĐ'; ?></td>
    <td><?php echo number_format($tien,0,',','.').' VNĐ'; ?></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="7">
        <p style="float:left; margin-left:20px;">Tổng tiền: 
           <strong><?php echo number_format($tongsotien,0,',','.').' VNĐ'; ?></strong>
        </p>
    </td>
  </tr>
</table>

<form method="POST" action="">
    <p style="margin:20px 0;">
        <label>Địa chỉ nhận hàng:</label><br>
        <input type="text" name="diachi" required style="width:50%; padding:8px;">
    </p>
    <p>
        <label>Số điện thoại:</label><br>
        <input type="text" name="sodienthoai" required style="width:50%; padding:8px;">
    </p>
    <button type="submit" name="dathang"
            style="background-color:#8080ff; color:white; padding:10px 20px; border:none; border-radius:5px;">Xác nhận đặt hàng
    </button>
    <i>(sau khi nhấn <b>Xác nhận đặt hàng</b> bạn sẽ không thể hủy đơn hàng)</i>
</form>
