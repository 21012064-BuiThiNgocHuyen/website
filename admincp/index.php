<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header('Location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/style_admin.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
   
</head>
<body>
    
    <div class="wrapper">
    <h3 class="title_admin">Quản lý cửa hàng</h3>
    <?php 
       include("config/config.php");
       include("modules/header.php");
       include("modules/menu.php");
        include("modules/main.php");
        include("modules/footer.php");
       ?>
       
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"> </script>
    <script src="https://cdn.ckeditor.com/4.24.0-lts/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'thongtinlienhe' );
        CKEDITOR.replace( 'tomtat' );
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script type="text/javascript" >
    $(document).ready(function(){
        thongke();
        var char = new Morris.Area({
            element: 'myfirstchart',

            xkey: 'date',
 
            ykeys: ['date','order','sales','quantity'],
 
            labels: ['Ngày đặt','Đơn hàng', 'Doanh thu', 'Số lượng bán ra']
        });
        $('.select-date').change(function(){
            var thoigian = $(this).val();
            if(thoigian=='7ngay'){
                var text = '7 ngày';
            }else if(thoigian=='28ngay'){
                var text = '28 ngày';
            }else if(thoigian=='90ngay'){
                var text = '90 ngày';
            }else{
                var text = '365 ngày';
            }
            $.ajax({
                url:"modules/thongke.php",
                method : "POST",
                dataType: "JSON",
                data: {thoigian:thoigian},
                success: function(data){
                    char.setData(data);
                    $('#text-date').text(text);
                }
            });
        })
        function thongke(){
            var text = '7 ngày';
            $.ajax({
                url:"modules/thongke.php",
                method : "POST",
                dataType: "JSON",
                success: function(data){
                    char.setData(data);
                    $('#text-date').text(text);
                }
            });
        }
    })
    </script>
</body>
</html>