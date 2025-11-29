<?php
    $sql_lietke_donhang = "SELECT * FROM tbl_donhang ORDER BY id_donhang DESC";
    $query_lietke_donhang = mysqli_query($mysqli,$sql_lietke_donhang);
?>
<h2 style="text-align:center">Quản lý đơn hàng</h2>
<table method="post" action="" width="100%" border="1" style="border-collapse:collapse; padding-bottom:40px">
    <form>
        <tr>
            <th style="padding:10px;">Id</th>
            <th>Tên khách hàng</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Địa chỉ nhận hàng</th>
            <th>Số điện thoại</th>
            <th>Quản lý</th>
        </tr>
    <?php
        $i = 0;
        while($row = mysqli_fetch_array($query_lietke_donhang)){
            $i++;
    ?>
        <tr>
            <td style="text-align:center; padding:10px;"><?php echo $i; ?></td>
            <td style="text-align:center"><?php echo $row['tennguoidathang']; ?></td>
            <td style="text-align:center"><?php echo $row['tensanpham']; ?></td>
            <td style="text-align:center"><?php echo $row['soluong']; ?></td>
            <td style="text-align:center"><?php echo number_format($row['Tongtien'],0,',','.').' VNĐ'; ?></td>
            <td style="text-align:center"><?php echo $row['diachinhanhang']; ?></td>
            <td style="text-align:center"><?php echo $row['sodienthoai']; ?></td>
            <td style="text-align:center">
                <a style="text-decoration:none; background-color: #9999ff; padding:5px 10px 5px 10px; border-radius:5px; font-size: 20px;" href="modules/quanlysp/xuly.php?iddonhang=<?php echo $row['id_donhang']; ?>"><i class="fa fa-trash" style="color: red;" aria-hidden="true"></i></a>
            </td>
        </tr>
    <?php
        }
    ?>
    </form>

</table>