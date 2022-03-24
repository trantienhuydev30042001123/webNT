<?php
if(isset($_POST['username'])):
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "select*from admin where username ='$username' and password='$password'";
    $result = $con->query($query);
    if(mysqli_num_rows($result)== 0):
      $alert ="sai tên đăng nhập hoặc mật khẩu";
    else:
        $users = mysqli_fetch_array($result);
        if($users['adminStatus']== 0):
            $alert ="tài khoản của bạn đang bị khóa";
        else:
            $_SESSION['admin'] =$username;
           header("location:.");
        endif;

    endif; 
endif;

?> 

<section style=" float: left; text-align: right; width: 40%;" >
    <h1 style="color:red;" >ĐĂNG NHẬP TÀI KHOẢN ADMIN</h1>
    <section><?=isset($alert)?$alert:""?></section>
    <section >
        <form  method="post">
            <section>
                <label style="color:#FF4500;">Username:</label><input type="text" name="username" >
            </section>
            <br>
            <section>    
                <label  style="color:#FF4500;">Password:</label><input type="password" name="password">
            </section>
            <br>
            <section  ><input  type="submit" value="LOGIN"></section>
        </form>
    </section>
</section>