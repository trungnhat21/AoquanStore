<?php
    session_start();
    include('../../admincp/config/config.php');
    // thêm số lượng
    if(isset($_GET['cong'])) {
        $id = $_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item) {
            if($cart_item['id'] != $id) {
                $product[] = array('masanpham'=>$cart_item['masanpham'],'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                'soluong'=>$cart_item['soluong'],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh']);
                $_SESSION['cart'] = $product;
            }else {
                $Congsoluong = $cart_item['soluong'] + 1;
                if($cart_item['soluong'] < 10) {
                    $product[] = array('masanpham'=>$cart_item['masanpham'],'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                    'soluong'=>$Congsoluong,'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh']);
                }else {
                    $product[] = array('masanpham'=>$cart_item['masanpham'],'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                    'soluong'=>$cart_item['soluong'],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh']);
                }
                
            }
        }
        $_SESSION['cart'] = $product;
        header('Location:../../index.php?quanly=giohang');
    }
    // trừ số lượng
    if(isset($_GET['tru'])) {
        $id = $_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item) {
            if($cart_item['id'] != $id) {
                $product[] = array('masanpham'=>$cart_item['masanpham'],'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                'soluong'=>$cart_item['soluong'],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh']);
                $_SESSION['cart'] = $product;
            }else {
                $Congsoluong = $cart_item['soluong'] - 1;
                if($cart_item['soluong'] > 1) {
                    $product[] = array('masanpham'=>$cart_item['masanpham'],'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                    'soluong'=>$Congsoluong,'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh']);
                }else {
                    $product[] = array('masanpham'=>$cart_item['masanpham'],'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                    'soluong'=>$cart_item['soluong'],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh']);
                }
                
            }
        }
        $_SESSION['cart'] = $product;
        header('Location:../../index.php?quanly=giohang');
    }
    //xoa san pham trong gio hang
    if(isset($_SESSION['cart']) && isset($_GET['xoa'])) {
        $id = $_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item) {
            if($cart_item['id'] != $id) {
                $product[] = array('masanpham'=>$cart_item['masanpham'],'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                'soluong'=>$cart_item['soluong'],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh']);
            }
        $_SESSION['cart'] = $product;
        header('Location:../../index.php?quanly=giohang');
        }
    }
    //themgiohang
    if(isset($_POST['themgiohang'])) {
        //session_destroy();
        $id = $_GET['idsanpham'];
        $soluong = 1;
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '".$id."' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_array($query);
        if($row) {
            $new_product = array(array('masanpham'=>$row['masanpham'],'tensanpham'=>$row['tensanpham'],'id'=>$id,'soluong'=>$soluong,
            'giasanpham'=>$row['giasanpham'],'hinhanh'=>$row['hinhanh']));
            if(isset($_SESSION['cart'])) {
                $found = false;
                foreach($_SESSION['cart'] as $cart_item) {
                    // trùng dữ liệu
                    if($cart_item['id'] == $id) {
                        $product[] = array('masanpham'=>$cart_item['masanpham'],'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                        'soluong'=>$soluong+1,'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh']);
                        $found = true;
                    }else {
                        $product[] = array('masanpham'=>$cart_item['masanpham'],'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                        'soluong'=>$cart_item['soluong'],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh']);
                    }
                }
                if($found == false) {
                    //liên kết dữ liệu
                    $_SESSION['cart'] = array_merge($product,$new_product);
                }else {
                    $_SESSION['cart'] = $product;
                }
            }else {
                $_SESSION['cart'] = $new_product;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
?>