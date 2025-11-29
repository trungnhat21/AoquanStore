<?php
    $sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
    $query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<h2 style="text-align:center">Liệt kê danh mục sản phẩm</h2>
<table border="1" width="100%" style="border-collapse:collapse">
  <tr>
    <th style="padding:10px">Id</th>
    <th>Tên danh mục</th>
    <th>Quản lý</th>
  </tr>
    <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
        $i++;
    ?>
  <tr>
    <td style="text-align:center"><?php echo $i ?></td>
    <td style="text-align:center"><?php echo $row['tendanhmuc'] ?></td>
    <td style="text-align:center; padding:10px; width:20%">
        <a style="text-decoration:none; background-color: #9999ff; padding:5px 10px 5px 10px; border-radius:5px; font-size: 20px;" href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>"><i class="fa fa-trash" style="color: red;" aria-hidden="true"></i></a> | 
        <a style="text-decoration:none; background-color: #9999ff; padding:5px 10px 5px 10px; border-radius:5px; font-size: 20px;" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
    </td>
  </tr>
    <?php
    }
    ?>
</table>