<?php
$option='home';
$query = "select*from products where productStatus=1";
if(isset($_GET['brandid'])):
    $query .= " and brandid=".$_GET['brandid'];
    $option='showproduct&brandid= '.$_GET['brandid'] ;
   
elseif(isset($_POST['keyword'])):
    $query .=" and productName like '%".$_POST['keyword']."%'";
    $option='showproduct&key= '.$_POST['keyword'] ;
    
elseif(isset($_GET['from'])):
    $from = $_GET['from'];
    $to = $_GET['to'];
    $query .= " and productPrice>=$from and productPrice<$to";
    $option="showproduct&from=".$_GET['from'];
    $option .="&to=".$_GET['to'];
endif;
$result = $con->query($query);
//$page: xem các sản phẩm ở trang số bao nhiêu 
$page=1;
if(isset($_GET['page'])):
    $page=$_GET['page'];
endif;
//số lượng sản phẩm mỗi trang
$productsperpage =4;
//lấy các sản phẩm chỉ số bao nhiêu trong bảng
$from =($page-1)*$productsperpage;
//tính tổng số trang
$totalProducts = $con->query($query);
$totalPages= ceil(mysqli_num_rows($totalProducts)/$productsperpage);  
//lấy các sản phẩm ở trang hiện thời
$query .=" limit $from ,$productsperpage";
$result = $con->query($query);
?>
<section >
    <?php foreach($result as $item):?>
        <section class="product">
            <section> <a href="?option=productdetail&id=<?=$item['id']?>"><img src="imagess/<?=$item['productImage']?>" width="100%" height="350px"></a></section>
            <section> <b><?=$item['productName']?></b></section>
         

            <section><?=number_format($item['productPrice'],0,',','.')?>VND</section>
            <section><input type="button" value="Thêm vào giỏ hàng " onclick="location='?option=cart&action=add&id=<?=$item['id']?>';"></section>
        </section>
        <?php endforeach;?>
</section>
<section class="pages"> 
    <?php for($i=1; $i<=$totalPages; $i++):?>
        <a class="<?=(empty($_GET['page'])&&$i==1)||(isset($_GET['page'])&&$_GET['page']==$i)?'highlight':''?>" href="?option=<?=$option?>&page=<?=$i?>"><?=$i?></a>
    <?php endfor;?>
    
</section>