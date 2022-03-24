<?php 
if(isset($_POST['username'])):
	$username = $_POST['username'];
	$query = "select*from users where username='$username'";
	$result = $con->query($query);
	if(mysqli_num_rows($result) > 0):
		$alert = "Tên đăng nhập nãy đã có . Mời bạn chọn một tên khác!";
	else:
		$password = md5($_POST['password']);
		$fullname = $_POST['fullname'];
		$mobile = $_POST['mobile'];
		$address = $_POST['address'];
		$email = $_POST['email'];	
		$query = "insert users(username,password,fullname,mobile,address,email) values ('$username','$password','$fullname','$mobile','$address','$email')";
		$con->query($query);
		// header("location: ?option=login");
		echo"<script>location = '?option=login';</script>";
	endif;
endif;
?>

<section>
	<h1>Đăng ký tài khoản </h1>
	<section><?=isset($alert)?$alert:""?></section>
	<section>
		<form method="post" onsubmit="if(confirmpassword.value!=password.value){alert('mật khẩu không trùng khớp!'); confirmpassword.value='';confirmpassword.focus();
		return false;}">
			
			</section>
			 <table border="1" width="100%" cellpadding="0" cellspacing="0" class="dathang"> 
        <thead>
            <tr>
                <th ><label>Username: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  style=" width: 80%; height: 30px;" type="text" name="username" required></th>
                <th> <label>Password: </label><input  style=" width: 80%; height: 30px;" type="password" name="password"required></th> 
            </tr>
        </thead>
        <tbody>
           <tr>
               <td> <label>confirm password: </label><input style=" width: 70%; height: 30px;"  type="password" name="confirmpassword"required></td>
               <td><label>Fullname: </label>&nbsp;&nbsp;&nbsp;<input style=" width: 80%; height: 30px;"  type="text" name="fullname"required></td>
           </tr> 
            <tr>
               <td><label>Mobile: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style=" width: 80%; height: 30px;"  type="tel" name="mobile"required></td>
               <td><label>Address: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea  style=" width: 80%; height: 30px;" name="address" rows="3"required></textarea></td>
           </tr>
           <tr>
               <td colspan="2"> <label>Email: </label><input style=" width: 70%; height: 30px;"  type="email" name="email">
           </tr>
       </tbody>
        </table>
        <br>
			<section><input type="submit" name="sign up"></section>
		</form>
	</section>
</section>