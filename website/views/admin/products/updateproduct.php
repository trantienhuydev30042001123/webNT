<?php
$brand=mysqli_fetch_array($con->query("select*from products where id=".$_GET['id'])); 
?>
<?php
 if (isset($_POST['productName'])):
    $productName = $_POST['productName'];
   $query = "select*from products where productName = '$productName'and id!=".$brand['id'];
  
     if(mysqli_num_rows($con->query($query))!=0):
         $alert="Tên đã có sẵn vui lòng  kiểm tra lại!";
   else:
      $productStatus = $_POST['productStatus'];
       $con->query("update products set productName = '$productName',productStatus='$productStatus' where id= ".$brand['id']);
        header("location: ?option=products");
   endif;
 endif;
 
?>

<h1 style="  text-align: center; "> UPDATE SẢN PHẨM</h1>
<section><?=isset($alert)?$alert:''?></section>
<section style="  text-align: center; ">
    <form method="post">
        <section class="form-group">
            <label>Mã loại sản phẩm:</label><input value="<?=$brand['brandid']?>" type="text" name="brandid" required>
        </section><br>
        <section>
            <label >Tên sản phẩm :</label><input value="<?=$brand['productName']?>" type="text" name="productName" required>

        </section><br>
        <section class="form-group">
            <label>Giá: </label><input value="<?=$brand['productPrice']?>" type="text" name="productPrice" required>
        </section><br>
        <section class="form-group">
            <label>Ảnh:</label><input value="<?=$brand['productImage']?>" type="text" name="productImage" required>
        </section><br>
        <section class="form-group">
            <label>Link ảnh: </label><input value="<?=$brand['productImage']?>" type="text" name="productImage" required>
        </section><br>
        <section class="form-group">
            <label>Lượt xem:</label><input value="<?=$brand['productView']?>" type="text" name="productView" required>
        </section><br>
        <section class="form-group" >
        
        <section>
             <label >Status:</label><input type="radio" name="productStatus" value="1"<?=$brand['productStatus']==1?'checked':''?>>Active <input type="radio" name="productStatus" value="0" <?=$brand['productStatus']==0?'checked':''?>> UnActive 
            </section>
            <section>
                <input class="button" type="submit" value="UPDATE" > <input class="button" type="button" value="<<Back" onclick="location='?option=products';"></section>
            </section>
    </form>
</section>