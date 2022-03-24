<?php 
		if(isset($_GET['option'])):
			switch($_GET['option']):
				case'home':include"views/home.php";break;
				case'showproduct':include"views/showproduct.php";break;
				case'order':include"views/order.php";break;
				case'ordersuccess':include"views/ordersuccess.php";break;
				case'cart':include"views/cart.php";break;
				case'sigin':include"views/login.php";break;
				case'login':include"views/login.php";break;
				case'signup':include"views/signup.php";break;
				case'logout' : unset($_SESSION['user1']);header("location: ."); break;
				case'search': include"views/search.php"; break;
				case 'productdetail':include"views/productdetail.php";break; 
			endswitch;
		else:
			include"views/home.php";
		endif;

		?>