<div id="main">
    <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <?php 
        include("sidebar/sidebar.php");
        ?>
</div>
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
<div class="maincontent">
    <?php 
    if(isset($_GET['quanly'])){
        $tam = $_GET['quanly'];
    }else{
        $tam = '';
    }
    if($tam == 'danhmucsanpham'){
        include("main/danhmuc.php");

    }elseif($tam == 'giohang'){
        include("main/giohang.php");

    }elseif($tam == 'danhmucbaiviet'){
        include("main/danhmucbaiviet.php");

    }elseif($tam == 'baiviet'){
        include("main/baiviet.php");

    }elseif($tam == 'tintuc'){
        include("main/tintuc.php");

    }elseif($tam == 'lienhe'){
        include("main/lienhe.php");

    }elseif($tam == 'sanpham'){
        include("main/sanpham.php");

    }elseif($tam == 'dangky'){
        include("main/dangky.php");

    }elseif($tam == 'thanhtoan'){
        include("main/thanhtoan.php");

    }elseif($tam == 'dangnhap'){
            include("main/dangnhap.php");

    }elseif($tam == 'timkiem'){
            include("main/timkiem.php");

    }elseif($tam == 'thank'){
            include("main/thank.php");

    }elseif($tam == 'thaydoimatkhau'){
        include("main/thaydoimatkhau.php");
    
    }elseif($tam == 'vanchuyen'){
        include("main/thongtinvanchuyen.php");

    }elseif($tam == 'chitietdonhang'){
        include("main/chitietdonhang.php");
    }elseif($tam == 'xemdonhang'){
        include("main/xemdonhang.php");
    }else{
        include("main/index.php");

    }
    ?>
    </div>
    </div>
</div>
</div>