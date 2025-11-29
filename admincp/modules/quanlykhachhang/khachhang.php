<?php
    $sql_lietke_khachhang = "SELECT * FROM tbl_lienhe ORDER BY id_lienhe DESC";
    $query_lietke_khachhang = mysqli_query($mysqli,$sql_lietke_khachhang);
?>
<h2 style="text-align:center">Hỗ trợ khách hàng</h2>
<table method="post" action="" width="100%" border="1" style="border-collapse:collapse; padding-bottom:40px">
    <form>
        <tr>
            <th style="padding:10px;">Id</th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Nội dung</th>
            <th>Quản lý</th>
        </tr>
    <?php
        $i = 0;
        while($row = mysqli_fetch_array($query_lietke_khachhang)){
            $i++;
    ?>
        <tr>
            <td style="text-align:center; padding:10px;"><?php echo $i; ?></td>
            <td style="text-align:center"><?php echo $row['hoten']; ?></td>
            <td style="text-align:center"><?php echo $row['email']; ?></td>
            <td style="text-align:center"><?php echo $row['noidung']; ?></td>
            <td style="text-align:center">
                <a style="text-decoration:none; background-color: #9999ff; padding:5px 10px 5px 10px; border-radius:5px; font-size: 20px;" href="modules/quanlysp/xuly.php?idkhachhang=<?php echo $row['id_lienhe']; ?>"><i class="fa fa-trash" style="color: red;" aria-hidden="true"></i></a>
            </td>
        </tr>
    <?php
        }
    ?>
    </form>

</table>