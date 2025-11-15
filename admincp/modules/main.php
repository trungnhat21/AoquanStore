<div class="clear"></div>
<div class="main">
    <?php
    if(isset($_GET['action']) && $_GET['query']) {
        $tam = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tam = '';
        $query = '';
    }
    if($tam == 'quanlydanhmucsanpham' && $query =='them') {
        include("modules/quanlydanhmucsp/them.php");
        include("modules/quanlydanhmucsp/lietke.php");
    }elseif($tam == 'quanlydanhmucsanpham' && $query =='sua') {
        include("modules/quanlydanhmucsp/sua.php");
    }elseif($tam == 'quanlysanpham' && $query =='them') {
        include("modules/quanlysp/them.php");
        include("modules/quanlysp/lietke.php");
    }elseif($tam == 'quanlysanpham' && $query =='sua') {
        include("modules/quanlysp/sua.php");
    }elseif($tam == 'quanlykhachhang' && $query =='them') {
        include("modules/quanlykhachhang/khachhang.php");
    }elseif($tam == 'quanlydonhang' && $query =='them') {
        include("modules/quanlydonhang/donhang.php");
    }else {
        include("modules/dashboard.php");
    }
    ?>
</div>