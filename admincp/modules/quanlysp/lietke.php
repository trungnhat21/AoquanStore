<?php
    $sql_lietke_sp = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
    $query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
?>
<h2 style="text-align:center">Liệt kê sản phẩm</h2>
<table border="1" style="width:100%; border-collapse:collapse">
  <tr>
    <th style="padding:10px">Id</th>
    <th>Tên sản phẩm</th>
    <th>Mã sản phẩm</th>
    <th>Giá sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Tóm tắt</th>
    <th>Số lượng</th>
    <th>Danh mục</th>
    <th>Tình trạng</th>
    <th>Quản lý</th>
  </tr>
    <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_sp)) {
        $i++;
    ?>
  <tr>
    <td style="text-align:center"><?php echo $i ?></td>
    <td style="text-align:center"><?php echo $row['tensanpham'] ?></td>
    <td style="text-align:center"><?php echo $row['masanpham'] ?></td>
    <td style="text-align:center"><?php echo $row['giasanpham'] ?></td>
    <td style="text-align:center"><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
    <td style="text-align:center"><?php echo $row['tomtat'] ?></td>
    <td style="text-align:center"><?php echo $row['soluong'] ?></td>
    <td style="text-align:center"><?php echo $row['tendanhmuc'] ?></td>
    <td style="text-align:center"><?php if($row['tinhtrang'] == 1) {
        echo 'Mở';
    }else {
        echo 'Đóng';
      } ?></td>
    <td style="text-align:center;">
        <a style="text-decoration:none; background-color: #9999ff; padding:5px 10px 5px 10px; border-radius:5px; font-size: 20px;" href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>"><i class="fa fa-trash" style="color: red;" aria-hidden="true"></i></a> | 
        <a style="text-decoration:none; background-color: #9999ff; padding:5px 10px 5px 10px; border-radius:5px; font-size: 20px;" href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
    </td>
  </tr>
    <?php
    }
    ?>
</table>