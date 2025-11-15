<?php
include('../../config/config.php');
$tensanpham = $_POST['tensanpham'];
$masanpham = $_POST['masanpham'];
$giasanpham = $_POST['giasanpham'];
$soluong = $_POST['soluong'];
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;

if(isset($_POST['themsanpham'])) {

    $sql_them = "INSERT INTO tbl_sanpham(tensanpham,masanpham,giasanpham,soluong,noidung,tomtat,hinhanh,tinhtrang,id_danhmuc) VALUES('".$tensanpham."'
    , '".$masanpham."','".$giasanpham."','".$soluong."','".$noidung."','".$tomtat."','".$hinhanh."','".$tinhtrang."','".$danhmuc."')";
    mysqli_query($mysqli,$sql_them);
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    header('location:../../index.php?action=quanlysanpham&query=them');
} elseif(isset($_POST['suasanpham'])) {
    if($hinhanh != '') {
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        $sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masanpham='".$masanpham."' ,giasanpham='".$giasanpham."',soluong='".$soluong."'
        ,noidung='".$noidung."',tomtat='".$tomtat."',hinhanh='".$hinhanh."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsanpham]'";
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)) {
            unlink('uploads/'.$row['hinhanh']);
        }
    } else {
         $sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masanpham='".$masanpham."' ,giasanpham='".$giasanpham."',soluong='".$soluong."'
        ,noidung='".$noidung."',tomtat='".$tomtat."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsanpham]'";
    }
    mysqli_query($mysqli,$sql_update);
    header('location:../../index.php?action=quanlysanpham&query=them');
} else {
    $id = $_GET['idsanpham'];
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)) {
        unlink('uploads/'.$row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('location:../../index.php?action=quanlysanpham&query=them');
}

if(isset($_GET['idkhachhang'])) {
    $id = $_GET['idkhachhang'];
    $sql_xoakh = "DELETE FROM tbl_lienhe WHERE id_lienhe = $id";
    mysqli_query($mysqli, $sql_xoakh);
    header('Location: ../../index.php?action=quanlykhachhang&query=them');
}

if(isset($_GET['iddonhang'])) {
    $id = $_GET['iddonhang'];
    $sql_xoakh = "DELETE FROM tbl_donhang WHERE id_donhang = $id";
    mysqli_query($mysqli, $sql_xoakh);
    header('Location: ../../index.php?action=quanlydonhang&query=them');
}