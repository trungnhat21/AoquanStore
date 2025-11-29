<?php
if(isset($_POST['dangnhap'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if($email == "" || $password == "") {
        echo '<script>alert("Vui lòng nhập đầy đủ Email và Password");</script>';
    } else {
        $matkhau = md5($password);
        $sql = "SELECT * FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $dem = mysqli_num_rows($row);
        if($dem > 0) {
            $row_data = mysqli_fetch_array($row);
            $_SESSION['dangky'] = $row_data['tenkhachhang'];
            header("Location:index.php?quanly=giohang");
        } else {
            echo '<script>alert("Email hoặc Password không đúng, vui lòng nhập lại");</script>';
        }
    }
}
?>
<?php
if(isset($_POST['doimatkhau'])) {
    header("Location:index.php?quanly=doimatkhau");
}
?>
<form action="" autocomplete="off" method="post">
    <table width="40%" style="border-spacing: 10px; text-align:center; margin-left: 200px; background-color: #d9d9d9; padding: 20px; border-radius: 10px;">
        <tr>
            <td><h3>ĐĂNG NHẬP</h3></td>
        </tr>
        <tr>
            <td style="padding: 10px;"><input style="width: 80%;" type="text" name="email" placeholder="Email Address"></td>
        </tr>
        <tr>
            <td style="padding: 10px;"><input style="width: 80%; padding: 10px 5px 10px 5px;" type="password" name="password" placeholder="Password"></td>
        </tr>
        <tr>
            <td><button style="padding: 10px 45px; background-color:blue; border-radius:5px; color: white;" type="submit" name="dangnhap">Sign in</button></td>
        </tr>
        <tr>
            <td><button style="padding: 10px 12px; background-color:blue; border-radius:5px; color: white;" type="submit" name="doimatkhau">Change password</button></td>
        </tr>
    </table>
    </form>
