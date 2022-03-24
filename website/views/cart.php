<?php
if(empty($_SESSION['cart'])){
    $_SESSION['cart']=array();
}
if(isset($_GET['action'])){
    $id=isset($_GET['id'])?$_GET['id']:'';
    switch($_GET['action']){
        case'add':
          if(array_key_exists($id,array_keys($_SESSION['cart']))){
              $_SESSION['cart'][$id]++;

          }else {
              $_SESSION['cart'][$id]=1;
          }
          header("location:?option=cart");
            break;
        case'delete':
            unset($_SESSION['cart'][$id]);
            break;
        case'deleteall':
            unset($_SESSION['cart']);
            break;
        case'update': 
             if($_GET['type']=='asc')
           $_SESSION['cart'][$id]++;
           else
           if($_SESSION['cart'][$id]>1)
           $_SESSION['cart'][$id]--;
           header("location:?option=cart");
             break;
            case 'order':
                if(isset($_SESSION['user1'])){
                    header("location:?option=order");             
                }else{
                    header("location:?option=login&order=1"); 
                }
                break;

    }
}
?>
<section class="cart">
    <?php
    if(!empty($_SESSION['cart'])):
        $ids = implode(',',array_keys($_SESSION['cart']));
        $query=" select*from products where id in($ids)";
        $result=$con->query($query);
    ?>
    <table border="1" width="100%" cellpadding="0" cellspacing="0"> 
        <thead>
            <tr>
                <td>ẢNH SẢN PHẨM</td>
                <td>TÊN SẢN PHẨM</td>
                <td>GIÁ SẢN PHẨM</td>
                 <td>sỐ lƯỢNG</td>
                 <td>TỔNG TIỀN</td>
                
            </tr>
        </thead>
        <tbody>
    <?php
         $toTal=0;
        foreach($result as $item):
     ?>
      <tr>
          <td width="35%"><img width="100%" src="imagess/<?=$item['productImage']?>" ></td>
          <td width="15%" ><b><?=$item['productName']?></b> <br><input type="button" value="XÓA SẢN PHẨM" class="buttoncart" onclick="location='?option=cart&action=delete&id=<?=$item['id']?>';"></td>
          <td width="15%"><?=number_format($item['productPrice'],0,',','.')?> VND</td>
          <section>
          <td width="10%"><input type="button" value="+" class="buttoncart" onclick="location='?option=cart&action=update&type=asc&id=<?=$item['id']?>';">&ensp;<?=$_SESSION['cart'][$item['id']]?>
          &ensp; <input type="button" value="-" class="buttoncart" onclick="location='?option=cart&action=update&type=desc&id=<?=$item['id']?>';"></td>
          </section>
          
          <td width="25%"> <?=number_format($subToTal=$item['productPrice']*$_SESSION['cart'][$item['id']],0,',','.')?> VND</td>
      </tr>
      <?php $toTal+=$subToTal;?>
     <?php
        endforeach;
        ?>
        <tr><td colspan="5" ><section>Tổng tiền: <?=number_format($toTal,0,',','.')?> VND</section> 
        &ensp;
       <section><input type="button" value="XÓA TẤT CẢ GIỎ HÀNG" class="buttoncart" onclick="if(confirm('bạn chắc chắn muốn xóa?'))location='?option=cart&action=deleteall';"> &ensp; <input type="button" value="ĐẶT HÀNG" class="buttoncart" onclick="location='?option=cart&action=order';"></section>
       &ensp;
    </td></tr>
    
       </tbody>
        </table>
    <?php
    else:
        ?>
        <section style="text-align:center;font-weight:bold;font-size:25px" > Giỏ hàng hiện đang trống!Vui lòng quay lại chọn sản phẩm .</section>
    <?php 
endif;?>
    </section>