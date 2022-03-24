<?php 
 if(isset($_POST['username'])):
    $username = $_POST['username'];
    $password = md5($_POST['password']); 
    $query = "select*from users where username='$username' and password='$password'";
    $result = $con->query($query);
    if (mysqli_num_rows($result) == 0): 
        $alert = "Sai tên đăng nhập hoặc mật khẩu!";
    else:
        $user = mysqli_fetch_array($result);
        if($user['status'] == 0):
            $alert = "Tài khoản của bạn hiện đang bị khóa!";


        else:
            $_SESSION['user1'] = $username;
            if(isset($_GET['productid'])){
                $userid=$users['id']; 
                $productid=$_GET['productid'];
                $contend=$_SESSION['contend'];
               $con->query("insert comments(userid,productid,date,contend)values($userid,$productid,now(),'$contend')");
       echo"<script>alert('bạn đã bình luận thành công.Bình luận của bạn sẽ sớm được giải đáp.!')</script>";
            }
            if(isset($_GET['order'])){
                header("location:?option=order");
            }
            else {
                header("location:?option=home");
            } 
        endif;
    endif;
 endif;
?>

<section>
    <h1>Đăng nhập tài khoản</h1>
    <section><?=isset($alert)?$alert:""?></section>
    <section>
        <form method="post">
            <section>
                <label>Username:</label><input type="text" name="username">
            </section>
            <br>
            <section>
                <label>Password: </label><input type="password" name="password">
            </section>
            <br>
            <section><input type="submit" name="Login"></section>
        </form>
    </section>
</section>