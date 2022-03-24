<?php
if(isset($_POST['contend'])):
	$content=$_POST['contend'];
	$productid=$_GET['id'];
	 if(isset($_SESSION['user1'])):
	    $userid=mysqli_fetch_array($con->query("select*from users where username='".$_SESSION['user1']."'"));
		$userid=$userid['id'];
		$con->query("insert comments(userid,productid,date,content)values($userid,$productid,now(),'$content')");
	   echo"<script>alert('bạn đã bình luận thành công.Bình luận của bạn sẽ sớm được giải đáp.!')</script>";
	 else:
		$_SESSION['contend']=$contend;
		echo"<script>alert('Bạn cần đăng nhập để có thể bình luận.!');
		location='?option=sigin&productid=$productid';</script>";
	 endif;
	endif;
?>
<!-- đây là chức năng xem chi tiết !-->
<?php 
	if(isset($_GET['id'])):
		$query = "select*from products where id= ".$_GET['id'];
		$result = $con->query($query);
		$item = mysqli_fetch_array($result);
	endif;
?>
	<h2 style="text-align: center; font-weight: bold; font-size: 29px;" >CHI TIẾT SẢN PHẨM</h2>
<section  class="productsanpham">

 <section> <img src="imagess/<?=$item['productImage']?>" width="90%" ></a></section>
 <section><b style="text-align: center; font-size: 29px;" ><?=$item['productName']?></b></section>
 <section><?=$item['productDescription']?></section>
 <section><?=number_format($item['productPrice'],0,',','.')?>VND</section>
 <section><input type="button" value="đặt hàng " class="button" onclick="location='?option=cart&action=add&id=<?=$item['id']?>';"></section> 
 <hr>                
<section>

</section>
<h2>Bình luận :</h2> 

 <form method="post">
		<section>
		<textarea name="contend" style="width:99%" rows="10" class="button1" placeholder="xin mời bạn viết bình luận.... "></textarea>
		</section>
		<section><input class="button" type="submit" value="bình luận "></section>
	</form>
	<?php 
$comments=$con->query("select*from users a join comments b on a.id=b.userid join products c on b.productid=c.id where productid=".$_GET['id']);
if(mysqli_num_rows($comments)==0):
	echo"<section style='color:green'> không có bình luận!</section>";
else:
	foreach($comments as $comment):
?>
<section style ="font-weight:bold; text-align: left;"><?=$comment['username']?></section>
<section style ="padding-left:2%; text-align: left;"><?=$comment['content']?></section>
<?php
  endforeach;
endif;
  ?>
</section>