<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $products=$con->query("select * from products where brandid=$id");
        if(mysqli_num_rows($products)!=0){
            $con->query("update brands set brandstatus=0 where id=$id");
        }else{
            $con->query("delete from brands where id=$id");
        }

    }
?>

<?php 
$query ="select*from brands";
$result = $con->query($query);
?>
<h2  style="  text-align: center; " >DANH SÁCH CÁC LOẠI SẢN PHẨM</h2>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>TÊN SẢN PHẨM </th>
            <th>TRẠNG THÁI</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($result as $item):?>
            <tr>
                <td><?=$item['id']?></td>
                <td><?=$item['brandname']?></td>
                <td><?=$item['brandstatus']==1?'Active':'UnActive'?></td>
                <td><a href="?option=updatebrand&id=<?=$item['id']?>"><input class="btn btn-primary" type="button" value="UPDATE"></a> 
                 <a href="?option=showbrands&id=<?=$item['id']?>" 
                onclick="return confirm('are you sure?')"><input class="btn btn-danger" type="button" value="DELETE"></a></td>
            </tr>
            <?php endforeach;?>
    </tbody>

</table>
&ensp;
&ensp;
<section>&ensp;&ensp; <a href="?option=addbrand"> <input class="btn btn-success" type="button" value="THÊM LOẠI SẢN PHẨM"></a></section> 
&ensp;
&ensp;