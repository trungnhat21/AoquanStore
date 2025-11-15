<?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
    }
?>
<div class="menu">
            <ul class="list_menu">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="index.php?quanly=giohang">Giỏ hàng</a></li>
                <?php
                if(isset($_SESSION['dangky'])){ 
                ?>
                <li><a href="index.php?dangxuat=1">Đăng xuất</a></li>
                <?php
                }else {
                ?>
                <li><a href="index.php?quanly=dangky">Đăng ký</a></li>
                <?php
                }
                ?>
                <li><a href="index.php?quanly=thongtin">Thông tin</a></li>
                <li><a href="index.php?quanly=lienhe">Liên hệ</a></li>
            </ul>
        </div>