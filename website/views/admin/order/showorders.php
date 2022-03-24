<?php
     if(isset($_GET['id'])){
        $id=$_GET['id'];
        $con->query("delete from orderdetail where orderid=$id");
        $con->query("delete from orders where id=$id");
        header("location: ?option=order&status=4");
        }

     
?>
<?php 
$status=$_GET['status'];
$query ="select*from orders where status=$status";
$result = $con->query($query);
?>
<h1  style="  text-align: center; " >DANH SÁCH ĐƠN HÀNG <?=$status==1?'CHƯA XỬ LÝ':($status==2?'ĐANG XỬ LÝ':($status==3?'ĐÃ XỬ LÝ':'HỦY'))?></h1>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Ngày tạo  </th>
           <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $count=1;?>
        <?php foreach($result as $item):?>
            <tr>
                <td><?=$count++?></td>
                <td><?=$item['id']?></td>
                <td><?=$item['orderdate']?></td>
                 <td><a href="?option=orderdetail&id=<?=$item['id']?>"><input class="btn btn-primary" type="button" value="Detail"></a>  <a style="display:<?=$status==4?'block':'none'?>" href="?option=order&id=<?=$item['id']?>" onclick="return confirm('Are you sure ?')"><input class="btn btn-danger" type="button" value="DELETE"></a></td>
            </tr>
            <?php endforeach;?>
    </tbody>

</table>