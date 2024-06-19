
<ul class="admin_list">
    <li><a href="index.php"><i class="fa-solid fa-house"></i></a></li>
    <li><a href="index.php?action=quanlydanhmucsanpham&query=lietke">Quản lý danh mục sản phẩm</a></li>
    <li><a href="index.php?action=quanlysp&query=lietke">Quản lý sản phẩm</a></li>
    <li><a href="index.php?action=quanlydanhmucbaiviet&query=lietke">Quản lý danh mục bài viết</a></li>
    <li><a href="index.php?action=quanlybaiviet&query=lietke">Quản lý bài viết</a></li>
    <li><a href="index.php?action=quanlydonhang&query=lietke">Quản lý đơn hàng</a></li>
    <li><a href="index.php?action=quanlylienhe&query=capnhat">Quản lý liên hệ</a></li>
    <li><a href="login.php">Đăng xuất
    <?php
    if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1){
        unset($_SESSION['dangnhap']);
        // header('Location:login.php');
    }
    ?>
    </a></li>


</ul>