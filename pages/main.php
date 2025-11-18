        <div id="main">
                <?php
                include("sidebar/sidebar.php");
                ?>

            <div class="maincontent">
                <?php
                   if(isset($_GET['quanly'])) {
                        $tam = $_GET['quanly'];
                    } else {
                        $tam = '';
                    }
                    if($tam == 'danhmucsanpham') {
                        include("main/danhmuc.php");
                    } elseif($tam == 'giohang') {
                        include("main/giohang.php");
                    } elseif($tam == 'dangky') {
                        include("main/dangky.php");
                    } elseif($tam == 'dangnhap') {
                        include("main/dangnhap.php");
                    } elseif($tam == 'doimatkhau') {
                        include("main/doimatkhau.php");
                    }elseif($tam == 'thanhtoan') {
                        include("main/thanhtoan.php");
                    } elseif($tam == 'thongtin') {
                        include("main/thongtin.php");
                    } elseif($tam == 'lienhe') {
                        include("main/lienhe.php");
                    } elseif($tam == 'sanpham') {
                        include("main/sanpham.php");
                    } else {
                        include("main/index.php");
                    }
                ?>
            </div>
        </div>