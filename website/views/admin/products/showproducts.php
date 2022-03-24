<?php
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$products=$con->query("select * from products where brandid=$id");
		if(mysqli_num_rows($products)!=0){
			$con->query("update products set productStatus=0 where id=$id");
		}else{
			$con->query("delete from products where id=$id");
		}

	}
?>
<?php 
$query ="select*from products";
$result = $con->query($query);
?>
<h2  style="  text-align: center;" >DANH SÁCH SẢN PHẨM</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>TÊN </th>
            <th>GIÁ</th>
            <th>ẢNH</th>
            <th>TRẠNG THÁI</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $count=1;?>
        <?php foreach($result as $item):?>
            <tr>
                <td><?=$count++?></td>
                <td width="3%"><?=$item['id']?></td>
                <td><?=$item['productName']?></td>
                <td><?=number_format($item['productPrice'],0,',','.') ?>VND</td>
                <td width="40%"><img src="../imagess/<?=$item['productImage']?>" width = "60%"> </td>
                <td><?=$item['productStatus']==1?'Active':'UnActive'?></td>
                <td><a href="?option=updateproduct&id=<?=$item['id']?>"><input class="btn btn-primary" type="button" value="UPDATE"></a>  <a href="?option=products&id=<?=$item['id']?>" onclick="return confirm('Are you sure ?')"><input class="btn btn-danger" type="button" value="DELETE"></a></td>
            </tr>
            <?php endforeach;?>
    </tbody>

</table>
<br>
<section> <a href="?option=add"> <input class="btn btn-success" type="button" value="THÊM SẢN PHẨM"></a></section> 