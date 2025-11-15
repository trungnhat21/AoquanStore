<h2>Chi tiết sản phẩm</h2>
<?php
    $sql_chitiet= "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
    AND tbl_sanpham.id_sanpham = '$_GET[id]' LIMIT 1";
    $query_chitiet = mysqli_query($mysqli,$sql_chitiet);
    while($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
<div class="wrapper_detail">
    <div class="anh_sanpham">
        <img width="300px" style="height: auto;" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>">
    </div>
    <form method="post" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']?>">
        <div class="chitiet_sanpham">
            <h3 style="margin: 0;">Tên sản phẩm: <?php echo $row_chitiet['tensanpham']?></h3>
            <p>Mã sản phẩm: <?php echo $row_chitiet['masanpham']?></p>
            <p>Giá sản phẩm: <?php echo number_format($row_chitiet['giasanpham'],0,',','.').'VNĐ'?></p>
            <p>Số lượng sản phẩm: <?php echo $row_chitiet['soluong']?></p>
            <p>Danh mục sản phẩm: <?php echo $row_chitiet['tendanhmuc']?></p>
            <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm vào giỏ hàng"></p>
        </div>
    </form>
</div>
<?php
}
?>