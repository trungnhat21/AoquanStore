<?php
if (isset($_POST['dangky'])) {
    $tenkhachhang = trim($_POST['tenkhachhang']);
    $email        = trim($_POST['email']);
    $password     = trim($_POST['matkhau']);
    $dienthoai    = trim($_POST['dienthoai']);
    if ($tenkhachhang === "" || $email === "" || $password === "" || $dienthoai === "") {
        echo '<script>alert("Vui lòng nhập đầy đủ thông tin trước khi đăng ký!");</script>';
    } else {
        $matkhau = md5($password);
        $check_email = mysqli_query($mysqli, "SELECT * FROM tbl_dangky WHERE email='$email' LIMIT 1");
        if (mysqli_num_rows($check_email) > 0) {
            echo '<script>alert("Email này đã được sử dụng, vui lòng nhập email khác!");</script>';
        } else {
            $sql_dangky = mysqli_query(
                $mysqli,
                "INSERT INTO tbl_dangky(tenkhachhang,email,matkhau,sodienthoai) 
                 VALUES('$tenkhachhang','$email','$matkhau','$dienthoai')"
            );
            if ($sql_dangky) {
                header("Location: index.php?quanly=dangnhap");
                exit;
            } else {
                echo '<script>alert("Có lỗi xảy ra, vui lòng thử lại sau!");</script>';
            }
        }
    }
}
?>
<h2 style="text-align:center">ĐĂNG KÝ TÀI KHOẢN</h2>
<form action="" method="post">
<table width="95%" style="border-spacing: 10px; background-color: #d9d9d9; padding: 20px; border-radius: 10px;">
    <tr>
        <td style="width: 20%; font-size: 20px;">Tên khách hàng</td>
        <td><input style="width: 70%;" type="text" name="tenkhachhang"></td>
    </tr>
    <tr>
        <td style="width: 20%; font-size: 20px;">Email</td>
        <td><input style="width: 69%; padding: 10px;" type="email" name="email"></td>
    </tr>
    <tr>
        <td style="width: 20%; font-size: 20px;">Mật khẩu</td>
        <td><input style="width: 69%; padding: 10px;" type="password" name="matkhau"></td>
    </tr>
    <tr>
        <td style="width: 20%; font-size: 20px;">Số điện thoại</td>
        <td><input style="width: 70%;" type="text" name="dienthoai" pattern="[0-9]*"></td>
    </tr>
    <tr>
        <td colspan="2"><input style="width: 10%; padding: 10px; font-size: 16px; background-color: #8080ff; color: white; border: none; border-radius: 5px;" type="submit" name="dangky" value="Đăng ký">
        <a style="text-decoration: none; margin-left: 10px; padding: 11px; font-size: 16px; background-color: #8080ff; color: white; border: none; border-radius: 5px;" href="index.php?quanly=dangnhap">Đăng nhập</a></td>
    </tr>
</table>
</form>