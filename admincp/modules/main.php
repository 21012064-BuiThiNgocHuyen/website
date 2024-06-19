<div class="clear"></div>
<div class="main">
    <?php
        if(isset($_GET['action']) && $_GET['query']){
            $tam = $_GET['action'];
            $query = $_GET['query'];
        }else{
            $tam = '';
            $query = '';
        }
        //quanlydanhmucsp

        if($tam=='quanlydanhmucsanpham' && $query=='them'){
            include("modules/quanlydanhmucsp/them.php");
        }elseif($tam=='quanlydanhmucsanpham' && $query=='sua'){
            include("modules/quanlydanhmucsp/sua.php");
        }elseif($tam=='quanlydanhmucsanpham' && $query=='lietke'){
            include("modules/quanlydanhmucsp/lietke.php");
        }
        //quanlysp
        elseif($tam=='quanlysp' && $query=='them'){
            include("modules/quanlysp/them.php");
        }elseif($tam=='quanlysp' && $query=='sua'){
            include("modules/quanlysp/sua.php");
        }elseif($tam=='quanlysp' && $query=='lietke'){
            include("modules/quanlysp/lietke.php");
        }
        // quản lý đơn hàng
        elseif($tam == 'quanlydonhang' && $query == 'lietke'){
            include("modules/quanlydonhang/lietke.php");
        }elseif($tam == 'quanlydonhang' && $query == 'xemdonhang'){
            include("modules/quanlydonhang/xemdonhang.php");
        }
        // quản lý danh mục bài viết
        elseif($tam == 'quanlydanhmucbaiviet' && $query == 'them'){
            include("modules/quanlydanhmucbaiviet/them.php");
           
        }elseif($tam == 'quanlydanhmucbaiviet' && $query == 'sua'){
            include("modules/quanlydanhmucbaiviet/sua.php");
        }elseif($tam == 'quanlydanhmucbaiviet' && $query == 'lietke'){
            include("modules/quanlydanhmucbaiviet/lietke.php");
        }
        // quản lý bài viết
        elseif($tam == 'quanlybaiviet' && $query == 'them'){
            include("modules/quanlybaiviet/them.php");
        }elseif($tam == 'quanlybaiviet' && $query == 'sua'){
            include("modules/quanlybaiviet/sua.php");
        }elseif($tam == 'quanlybaiviet' && $query == 'lietke'){
            include("modules/quanlybaiviet/lietke.php");
        }
        // thông tin web
        elseif($tam == 'quanlylienhe' && $query == 'capnhat'){
            include("modules/lienhe/quanly.php");
        }
        else{
            include("modules/dashboard.php");
        }
    ?>
</div>