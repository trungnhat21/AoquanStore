<?php
    if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
        unset($_SESSION['login']);
        header('Location:login.php');
    }
?>
<p class="header_admin"><a style="text-decoration:none" href="index.php">Trang chủ</a> >
                            <a style="text-decoration:none" href="index.php?dangxuat=1">Đăng xuất<?php if(isset($_SESSION['login'])) {}?></a></p>