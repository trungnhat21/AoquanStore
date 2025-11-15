<?php
    $sql_tendanhmuc= "SELECT * FROM tbl_danhmuc WHERE id_danhmuc = '$_GET[id]' LIMIT 1";
    $query_tendanhmuc = mysqli_query($mysqli,$sql_tendanhmuc);
    $row_title = mysqli_fetch_array($query_tendanhmuc);

    $sql_sanpham = "SELECT * FROM tbl_sanpham WHERE id_danhmuc = '$_GET[id]' ORDER BY id_sanpham DESC";
    $query_sanpham = mysqli_query($mysqli,$sql_sanpham);
?>
<h3>Danh mục sản phẩm: <?php echo $row_title['tendanhmuc']?></h3>
                <ul class="product_list">
                    <?php
                    while($row_sanpham = mysqli_fetch_array($query_sanpham)) {
                    ?>
                    <li>
                        <a href="index.php?quanly=sanpham&id=<?php echo $row_sanpham['id_sanpham']?>">
                            <img src="admincp/modules/quanlysp/uploads/<?php echo $row_sanpham['hinhanh']?>">
                            <p class="title_product">Tên sản phẩm: <?php echo $row_sanpham['tensanpham']?></p>
                            <p class="title_price">Giá: <?php echo number_format($row_sanpham['giasanpham'],0,',','.').' VNĐ'?></p>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
