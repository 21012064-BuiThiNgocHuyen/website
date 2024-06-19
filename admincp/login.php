<?php
    session_start();
    include('config/config.php');
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['username'];
        $matkhau = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_admin WHERE username ='".$taikhoan."' AND password = '".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $_SESSION['dangnhap'] = $taikhoan;
            header("Location:index.php");
        }else{
            echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng, vui lòng nhập lại! </script>';
            header("Location:login.php");
            
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    ::selection {
        background: #4158d0;
        color     : #fff;
    }

    .wrapper-login {
        width        : 380px;
        background   : #fff;
        border-radius: 15px;
        box-shadow   : 0px 15px 20px rgba(0, 0, 0, 0.1);
        margin-left: 40%;
    }

    .wrapper-login .title {
        font-size    : 25px;
        font-weight  : 600;
        text-align   : center;
        line-height  : 100px;
        color        : #fff;
        user-select  : none;
        border-radius: 15px 15px 0 0;
        background   : linear-gradient(-135deg, #5BA8A0, #CBE5AE);
    }

    .wrapper-login form {
        padding: 10px 30px 50px 30px;
    }

    .wrapper-login form .field {
        height    : 50px;
        width     : 100%;
        margin-top: 20px;
        position  : relative;
    }

    .wrapper-login form .field input {
        height       : 100%;
        width        : 100%;
        outline      : none;
        font-size    : 13px;
        padding-left : 20px;
        border       : 1px solid lightgrey;
        border-radius: 25px;
        transition   : all 0.3s ease;
    }

    .wrapper-login form .field input:focus,
    form .field input:valid {
        border-color: #4158d0;
    }

    .wrapper-login form .field label {
        position      : absolute;
        top           : 50%;
        left          : 20px;
        color         : #999999;
        font-weight   : 400;
        font-size     : 13px;
        pointer-events: none;
        transform     : translateY(-50%);
        transition    : all 0.3s ease;
    }

    form .field input:focus~label,
    form .field input:valid~label {
        top       : 0%;
        font-size : 13px;
        color     : #4158d0;
        background: #fff;
        transform : translateY(-50%);
    }

    form .content {
        display        : flex;
        width          : 100%;
        height         : 50px;
        font-size      : 13px;
        align-items    : center;
        justify-content: space-around;
    }

    form .content .checkbox {
        display        : flex;
        align-items    : center;
        justify-content: center;
    }

    form .content input {
        width     : 15px;
        height    : 15px;
        background: red;
    }

    form .content label {
        color       : #262626;
        user-select : none;
        padding-left: 5px;
    }


    form .field input[type="submit"] {
        color       : #fff;
        border      : none;
        padding-left: 0;
        margin-top  : -10px;
        font-size   : 15px;
        font-weight : 500;
        cursor      : pointer;
        background  : linear-gradient(-135deg, #5BA8A0, #CBE5AE);
        transition  : all 0.3s ease;
    }

    form .field input[type="submit"]:active {
        transform: scale(0.95);
    }

    form .signup-link {
        color     : #262626;
        margin-top: 20px;
        text-align: center;
        font-size : 13px;
    }

    form .pass-link a,
    form .signup-link a {
        color          : #4158d0;
        text-decoration: none;
    }

    form .pass-link a:hover,
    form .signup-link a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
<div class="wrapper-login">
         <div class="title">
            Login Admin
         </div>
         <form action="" method="POST" autocomplete="off">
            <div class="field">
               <input name="username" type="text" required>
               <label>Tài khoản</label>
            </div>
            <div class="field">
               <input name="password" type="password" required>
               <label>Mật khẩu</label>
            </div>
            <div class="content">
               <div class="checkbox">
                  <input type="checkbox" id="remember-me">
                  <label for="remember-me">Remember me</label>
               </div>
               <div class="pass-link">
                  <a href="#">Đổi mật khẩu</a>
               </div>
            </div>
            <div class="field">
               <input type="submit" name="dangnhap" value="Đăng nhập">
            </div>
            <div class="signup-link">
               Not a member? <a href="index.php?quanly=dangky">Đăng ký</a>
            </div>
         </form>
      </div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>
