<?php
if(isset($_POST['doimatkhau'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['old_password']);
    $newpassword = trim($_POST['new_password']);
    $confirmpassword = trim($_POST['confirm_new_password']);

    if($email == "" || $password == "" || $newpassword == "" || $confirmpassword == "") {
        echo '<script>alert("Vui lòng nhập đầy đủ thông tin");</script>';
    } elseif($newpassword !== $confirmpassword) {
        echo '<script>alert("Mật khẩu mới và xác nhận mật khẩu không khớp");</script>';
    } else {
        $matkhau_cu = md5($password);
        $sql = "SELECT * FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau_cu."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $dem = mysqli_num_rows($row);
        if($dem > 0) {
            $matkhau_moi = md5($newpassword);
            $sql_update = "UPDATE tbl_dangky SET matkhau='".$matkhau_moi."' WHERE email='".$email."'";
            mysqli_query($mysqli,$sql_update);
            echo '<script>alert("Đổi mật khẩu thành công");</script>';
            header("Location:index.php?quanly=dangnhap");
        } else {
            echo '<script>alert("Email hoặc mật khẩu cũ không đúng, vui lòng nhập lại");</script>';
        }
    }
}
?>
<form action="" autocomplete="off" method="post">
    <table width="40%" style="border-spacing: 10px; text-align:center; margin-left: 200px; background-color: #d9d9d9; padding: 20px; border-radius: 10px;">
        <tr>
            <td><h3>ĐỔI MẬT KHẨU</h3></td>
        </tr>
        <tr>
            <td style="padding: 10px;"><input style="width: 80%; padding: 10px 5px 10px 5px;" type="email" name="email" placeholder="Nhập email"></td>
        </tr>
        <tr>
            <td style="padding: 10px;"><input style="width: 80%; padding: 10px 5px 10px 5px;" type="password" name="old_password" placeholder="Nhập mật khẩu cũ"></td>
        </tr>
        <tr>
            <td style="padding: 10px;"><input style="width: 80%; padding: 10px 5px 10px 5px;" type="password" name="new_password" placeholder="Nhập mật khẩu mới"></td>
        </tr>
        <tr>
            <td style="padding: 10px;"><input style="width: 80%; padding: 10px 5px 10px 5px;" type="password" name="confirm_new_password" placeholder="Xác nhận mật khẩu mới"></td>
        </tr>
        <tr>
            <td><button style="padding: 10px 45px; background-color:blue; border-radius:5px; color: white;" type="submit" name="doimatkhau">Change Password</button></td>
        </tr>
    </table>
    </form>
