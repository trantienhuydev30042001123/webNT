<?php
$brands=mysqli_fetch_array($con->query("select*from brands where id=".$_GET['id'])); 
?>
<?php
  if(isset($_POST['brandname'])):
   $brandname = $_POST['brandname'];
   $query = "select*from brands where brandname='$brandname'and id!=".$brands['id'];
  
     if(mysqli_num_rows($con->query($query))!=0):
         $alert="Tên đã có sẵn vui lòng  kiểm tra lại!";
   else:
         $brandstatus = $_POST['brandstatus'];
       $con->query("update brands set brandname='$brandname',brandstatus='$brandstatus' where id= ".$brands['id']);
        header("location: ?option=showbrands");
   endif;
 endif;

?>

<h1 style="  text-align: center; "> UPDATE LOẠI SẢN PHẨM</h1>
<section><?=isset($alert)?$alert:''?></section>
<section style="  text-align: center; ">
    <form method="post">
        <section class="form-group">
            <label >TÊN LOẠI SẢN PHẨM: </label><input value="<?=$brands['brandname']?>" type="text" name="brandname" required>

        </section><br>
        <section class="form-group">
             <label >TRẠNG THÁI: </label><input type="radio" name="brandstatus" value="1"<?=$brands['brandstatus']==1?'checked':''?>>Active <input type="radio" name="brandstatus" value="0" <?=$brands['brandstatus']==0?'checked':''?>> UnActive 
            </section><br>
            <section>
                <input type="submit" value="UPDATE" class="btn btn-primary" > <input class="button" type="button" value="<< BACK" onclick="location='?option=showbrands';"></section>
            </section>
    </form>
</section>