<?php
    if(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $matkhau = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_dangky WHERE email ='".$email."' AND matkhau = '".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $row_data = mysqli_fetch_array($row);
            $_SESSION['dangky'] = $row_data['tenkhachhang'];
            $_SESSION['id_khachhang'] = $row_data['id_dangky'];
            header("Location:index.php?quanly=giohang");
        }else{
            echo '<p style="color:red">Email hoặc Mật khẩu không đúng, vui lòng nhập lại! </p>';
            
            
        }
    }
?>

    <div class="wrapper-login">
         <div class="title">
            Login Form
         </div>
         <form action="" method="POST" >
            <div class="field">
               <input name="email" type="email" required>
               <label>Email</label>
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
                  <a href="index.php?quanly=thaydoimatkhau">Đổi mật khẩu</a>
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
        margin-left: 30%;
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