
    <?php 
    require ('../../../carbon/autoload.php');
    
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    include('../../config/config.php');

    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    if(isset($_GET['cart_status']) && isset($_GET['code'])){
        $status = $_GET['cart_status'];
        $code = $_GET['code'];
        $sql = mysqli_query($mysqli, "UPDATE tbl_cart SET cart_status='".$status."' WHERE code_cart='".$code."'");
        // thống kê doanh thu
        // cập nhật thống kê
        $sql_lietke_dh = "SELECT * FROM tbl_cart_details, tbl_sanpham WHERE tbl_cart_details.id_sanpham = tbl_sanpham.id_sanpham 
        AND tbl_cart_details.code_cart = '$_GET[code]' ORDER BY tbl_cart_details.id_cart_details DESC";
        $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);

        $sql_thongke = "SELECT * FROM tbl_thongke WHERE ngaydat = '$now'";
        $query_thongke = mysqli_query($mysqli, $sql_thongke);

        $soluongmua = 0;
        $doanhthu = 0;
        while($row = mysqli_fetch_array($query_lietke_dh)){
            $soluongmua += $row['soluongmua'];
            $doanhthu += $row['giasp'];
        }

        if(mysqli_num_rows($query_thongke)==0){
            $soluongban = $doanhthu;
            $doanhthu = $doanhthu;
            $donhang = 1;
            $sql_upadat_thongke = mysqli_query($mysqli," INSERT INTO tbl_thongke (ngaydat, soluongban, doanhthu, donhang) VALUE('$now','$soluongban', '$doanhthu', '$donhang')");
        }elseif(mysqli_num_rows($query_thongke)!=0){
            while($row_tk = mysqli_fetch_array($query_thongke)){
                $soluongban = $row_tk['soluongban']+$soluongban;
                $doanhthu = $row_tk['doanhthu']+ $doanhthu;
                $donhang = $row_tk['donhang']+1;
                $sql_upadat_thongke = mysqli_query($mysqli,"UPDATE tbl_thongke SET soluongban='$soluongban', doanhthu='$doanhthu', donhang='$donhang' WHERE ngaydat='$now' ");
            }
        }
        header('Location:../../index.php?action=quanlydonhang&query=lietke');
    }
?>