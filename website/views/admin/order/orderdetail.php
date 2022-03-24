<?php
if(isset($_GET['action'])){
		$con1=$_GET['id'];
		$con2=$_GET['productid'];
		if($_GET['type']=='asc'){
			$query="update orderdetail set number=number+1 where orderid=$con1 and productid=$con2";
		}else{
			$query="update orderdetail set number=number-1 where orderid=$con1 and productid=$con2";
		}
		$con->query($query);
		header("location: ?option=orderdetail&id=".$_GET['id']);
?>
<?php
	}
	if (isset($_POST['status'])){
		$status=$_POST['status'];
		$con->query("update orders set status=$status where id=".$_GET['id']);
		header("Refresh:0");

	}
?>
<?php
	$query="select a.fullname, a.mobile as 'mobileuser', a.address as 'addressuser', a.email as 'emailuser', b.*, c.name as 'nameordermethod' from users a join orders b on a.id=b.userid join ordermethod c on b.ordermethodid=c.id where b.id=".$_GET['id'];
	$order=mysqli_fetch_array($con->query($query));
?>

<h1>CHI TIẾT ĐƠN HÀNG<br>(Mã đơn hàng: <?=$order['id']?>)</h1>
<h2>NGÀY TẠO ĐƠN:</h2>
<p><?=$order['orderdate']?></p><hr>
<h2>THÔNG TIN NGƯỜI ĐẶT HÀNG</h2>
<table class="table table-bordered">
	<tbody>
		<tr>
			<td>Họ tên:</td>
			<td><?=$order['fullname']?></td>
		</tr>
		<tr>
			<td>Số Điện thoại:</td>
			<td><?=$order['mobileuser']?></td>
		</tr>
		<tr>
			<td>Địa chỉ:</td>
			<td><?=$order['addressuser']?></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><?=$order['emailuser']?></td>
		</tr>
		<tr>
			<td>Ghi chú:</td>
			<td><?=$order['note']?></td>
		</tr>
	</tbody>
</table><hr>
<h2>THÔNG TIN NGƯỜI NHẬN HÀNG</h2>
<table class="table table-bordered">
	<tbody>
		<tr>
			<td>Họ tên:</td>
			<td><?=$order['name']?></td>
		</tr>
		<tr>
			<td>Số điện thoại:</td>
			<td><?=$order['mobile']?></td>
		</tr>
		<tr>
			<td>Địa chỉ:</td>
			<td><?=$order['address']?></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><?=$order['email']?></td>
		</tr>
	</tbody>
</table>
<h2>PHƯƠNG THỨC THANH TOÁN</h2>
<table>
	<tr>
		<td><?=$order['nameordermethod']?></td>
	</tr>
</table><hr>
<?php
	$query="select a.status,b.*, c.productName,c.productImage, c.productPrice from orders a join orderdetail b on a.id=b.orderid join products c on b.productid=c.id where a.id=".$order['id'];
	$orderdetails=$con->query($query);
?>
<form method="post">	
	<h2>CÁC SẢN PHẨM ĐẶT MUA</h2>
	<?php $count=1;?>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên sản phẩm</th>
				<th>Ảnh</th>
				<th>Giá</th>
				<th style="width: 80px;">Số lượng</th>
                <td></td>

			</tr>
		</thead>
		<tbody>
		<?php foreach($orderdetails as $item):?>
		<tr>
			<td><?=$count++?></td>
			<td><?=$item['productName']?></td>
			<td><img src="../imagess/<?=$item['productImage']?>"width="50%"></td>
			<td><?=number_format($item['productPrice'],0,',','.')?>VNĐ</td>
			<td><input <?=$item['number']==0?'disabled':''?> type="button" value="-" onclick="location='?option=orderdetail&id=<?=$_GET['id']?>&action=update&type=desc&id=<?=$item['orderid']?>&productid=<?=$item['productid']?>';"> <?=$item['number']?><input type="button" value="+" onclick="location='?option=orderdetail&id=<?=$_GET['id']?>&action=update&type=asc&id=<?=$item['orderid']?>&productid=<?=$item['productid']?>';"> <br><br></td>
			

		</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<h2>TRẠNG THÁI ĐƠN HÀNG</h2>
		<p style="display: <?=$order['status']==2 || $order['status']==3?'none':''?>;"><input type="radio" name="status" value="1" <?=$order['status']==1?'checked':''?>> Chưa xử lý</p>
		<p style="display: <?=$order['status']==3?'none':''?>;"><input type="radio" name="status" value="2" <?=$order['status']==2?'checked':''?>> Đang xử lý</p>
		<p ><input type="radio" name="status" value="3" <?=$order['status']==3?'checked':''?>> Đã xử lý</p>
		<p style="display: <?=$order['status']==3?'none':''?>;"><input type="radio" name="status" value="4" <?=$order['status']==4?'checked':''?>> Xóa</p>
		<section><input <?=$order['status']==3?'disabled':''?> type="submit" value="Update đơn hàng" class="btn btn-primary">&emsp;&emsp;<input type="button" value="Quay lại" class="btn btn-danger" onclick="location= '?option=order&status=<?=$order['status']?>';"></section>
</form>