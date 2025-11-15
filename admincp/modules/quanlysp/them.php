<h2 style="text-align:center">Thêm sản phẩm</h2>
<table width="100%" style="border-spacing:10px; padding-bottom:40px">
    <form method="post" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
        <tr>
            <td style="width:20%; font-size: 1.5rem;">Tên sản phẩm</td>
            <td><input style="width:80%; padding:5px" type="text" name="tensanpham" ></td>
        </tr>
        <tr>
            <td style="width:20%; font-size: 1.5rem;">Mã sản phẩm</td>
            <td><input style="width:80%; padding:5px" type="text" name="masanpham"></td>
        </tr>
        <tr>
            <td style="width:20%; font-size: 1.5rem;">Giá sản phẩm</td>
            <td><input style="width:80%; padding:5px" type="text" name="giasanpham"></td>
        </tr>
        <tr>
            <td style="width:20%; font-size: 1.5rem;">Số lượng</td>
            <td><input style="width:80%; padding:5px" type="text" name="soluong"></td>
        </tr>
        <tr>
            <td style="width:20%; font-size: 1.5rem;">Nội dung</td>
            <td><textarea style="width:80%; padding:5px" rows="10" name="noidung" style="resize: none;"></textarea></td>
        </tr>
        <tr>
            <td style="width:20%; font-size: 1.5rem;">Tóm tắt</td>
            <td><textarea style="width:80%; padding:5px" rows="10" name="tomtat" style="resize: none;"></textarea></td>
        </tr>
        <tr>
            <td style="width:20%; font-size: 1.5rem;">Hình ảnh</td>
            <td><input type="file" name="hinhanh"></td>
        </tr>
        <tr>
            <td style="width:20%; font-size: 1.5rem;">Danh mục sản phẩm</td>
            <td>
                <select style="width:80%; padding:5px" name="danhmuc">
                    <?php
                    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                    $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
                    while($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                    ?>
                    <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td style="width:20%; font-size: 1.5rem;">Tình trạng</td>
            <td>
                <select style="width:80%; padding:5px" name="tinhtrang">
                    <option value="1">Mở</option>
                    <option value="0">Đóng</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input style="width:15%; padding:10px" type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
        </tr>
    </form>
</table>