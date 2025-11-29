<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
<?php
   include __DIR__ . "/../../admincp/config/config.php";
   if (isset($_POST['gui'])) {
    $hoten    = mysqli_real_escape_string($mysqli, $_POST['hoten']);
    $email   = mysqli_real_escape_string($mysqli, $_POST['email']);
    $noidung = mysqli_real_escape_string($mysqli, $_POST['noidung']);

    $sql = "INSERT INTO tbl_lienhe (hoten, email, noidung) 
            VALUES ('$hoten', '$email', '$noidung')";

    if (mysqli_query($mysqli, $sql)) {
        echo "<script>alert('Lưu thành công!');</script>";
    } else {
        echo "<script>alert('Lỗi: " . mysqli_error($mysqli) . "');</script>";
    }
}
?>
<div class="lienhe">
    <div class="phone">
        <p><i class="fa fa-phone"></i> 0123456789</p>
        <p><i class="fab fa-facebook"></i> FACEBOOK.COM/WnShop</p>
        <p><i class="fab fa-twitter"></i> @W/n Shop</p>
        <p><i class="fa fa-envelope"></i> W/nShop@gmail.com</p>
    </div>
    <div class="maulienhe">
        <form method="POST" action="">
        <table border="1" style="border-collapse:collapse; width:70%; background-color:#8080ff">
            <tr>
                <th colspan="2">BẠN CẦN HỖ TRỢ?</th>
            </tr>
            <tr style="border:none;">
                <td><input style="background-color:#4d4dff; padding-right: 300px" type="text" name="hoten" placeholder="Họ tên"></td>
                <td><input style="background-color:#4d4dff; padding: 12px 80px" type="email" name="email" placeholder="Email"></td>
            </tr>
            <tr style="border:none">
                <td colspan="2" style="text-align:center; padding: 10px"><textarea style="width:600px; height:100px" name="noidung" placeholder="Nội dung"></textarea></td>
            </tr>
            <tr style="border:none">
                <td colspan="2" style="text-align: center;"><button style="padding: 10px 40px; background-color:blue; border-radius:5px; color: white;" type="submit" name="gui">Gửi</button></td>
            </tr>
        </table>
        </form>
    </div>
</div>
</body>
</html>