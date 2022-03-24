<a href="?option=home" >TRANG CHỦ</a>
<a href="?option=cart" >GIỎ HÀNG</a>
	<?php if(empty($_SESSION['user1'])):?>
		<a href="?option=login" >ĐĂNG NHẬP</a>
		<a href="?option=signup" >ĐĂNG KÍ TÀI KHOẢN</a>
	<?php else:?>
		<section class="logout">
			Hello: <?=$_SESSION['user1']?> [<a href="?option=logout">Logout</a>] 
		</section>
	<?php endif;?>