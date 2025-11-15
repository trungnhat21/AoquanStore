<?php
    session_start();
    include('config/config.php');
    if(isset($_POST['login'])) {
        $taikhoan = $_POST['username'];
        $matkhau = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $dem = mysqli_num_rows($row);
        if($dem > 0) {
            $_SESSION['login'] = $taikhoan;
            header("Location:index.php");
        }else {
            echo '<script>alert("Tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại");</script>';
            header("Location:login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style type="text/css">
        body {
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .color {
            width: 60%;
            background-color: #8585e0;
            padding: 200px 100px 200px 100px;
            border-radius: 20px;
        }
        .wrapper-login {
            margin: 0 auto;
            width: 30%;
            background-color: #9999e6;
            border-radius: 15px;
            overflow: hidden;
        }
        .wrapper-login td {
            border: none;
        }
        table.login {
            width: 100%;
        }       
        table.login tr td {
            padding: 15px;
        }
        input {
            background-color: #adadeb;
            border: 1px solid black;
            border-radius: 5px;
        }
        button {
            padding: 10px;
            background-color: #3333ff;
        }
    </style>
</head>
<body>
    <div class="color">
    <div class="wrapper-login">
    <form action="" autocomplete="off" method="post">
    <table border="1" class="login" style="border-collapse:collapse; text-align:center">
        <tr>
            <td><h3>Welcome to Admin</h3></td>
        </tr>
        <tr >
            
            <td><input type="text" name="username" placeholder="Email Address"></td>
        </tr>
        <tr>
            <td><input type="password" name="password" placeholder="Password"></td>
        </tr>
        <tr>
            <td><button type="submit" name="login">Sign in</td>
        </tr>
    </table>
    </form>
    </div>
    </div>
</body>
</html>