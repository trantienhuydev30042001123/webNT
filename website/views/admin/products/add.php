<?php
	if (isset($_POST['productName'])):
		$productName = $_POST['productName'];
		$query = "select*from products where productName = '$productName'";
		$result = $con->query($query);
		if(mysqli_num_rows($result) > 0):
			$alert = "Đã có sản phẩm dùng tên này vui lòng dùng tên khác.";
		else:
			$brandid = $_POST['brandid'];
			$productName = $_POST['productName'];
			$productPrice = $_POST['productPrice'];
			$productImage = $_POST['productImage'];
			$productView = $_POST['productView'];
			$productDescription = $_POST['productDescription'];
			$productStatus = $_POST['productStatus'];
			$query = "insert products(brandid,productName,productPrice,productImage,productView,productDescription,productStatus) values ('$brandid','$productName','$productPrice','$productImage','$productView','$productDescription','$productStatus')";
			$con->query($query);
			header("location: ?option=showproducts");
		endif;
	endif;

?>
<style>
	label{display: block; float: left; width: 40%; text-align: right;}
</style>
<h2>THÊM SẢN PHẨM</h2>
<section><?=isset($alert)?$alert:""?></section>
<section class="container col-md-6">
	<form method="post">
		<section class="form-group">
			<label>Mã loại sản phẩm:</label><input type="number" name="brandid" min="1">
		</section><br>
		<section class="form-group">
			<label>Tên sản phẩm: </label><input type="text" name="productName" required>
		</section><br>
		<section class="form-group">
			<label>Giá: </label><input type="number" min="100000" name="productPrice">
		</section><br>
		<section class="form-group">
			<label>Ảnh:</label>
			<input type="file" name="productImage">
		</section><br>
		<section class="form-group">
			<label>Link ảnh: </label>
			<input type="text" name="productImage">
		</section><br>
		<section class="form-group">
			<label>Lượt xem:</label>
			<input type="number" name="productView">
		</section><br>
		<section class="form-group" >
			<label>Mô tả:</label><br>
			<textarea name="productDescription"  id="productDescription"></textarea>
			<script>CKEDITOR.replace("productDescription");</script>
		</section><br>
		<section class="form-group">
			<label>Trạng thái: </label><input type="radio" name="productStatus" value="1">Active <input type="radio" name="productStatus" value="0" checked>Unactive
		</section>
		<br>
		<section style="text-align : center;">
			<input class="btn btn-primary" type="submit" value="ADD" > <input class="btn btn-danger" type="button" value="<< BACK" onclick="location='?option=products';">
		</section>
	</form>
</section>