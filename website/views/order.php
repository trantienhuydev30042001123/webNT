<?php
$query="select*from users where username='".$_SESSION['user1']."'";
$users=mysqli_fetch_array($con->query($query));
?>
<?php
if(isset($_POST['name'])){
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    $email=$_POST['email']; 
    $note=$_POST['note'];
    $ordermethodid=$_POST['ordermethodid'];
    $userid=$users['id'];
    $query="insert orders(ordermethodid,userid,name,address,mobile,email,note)values($ordermethodid,$userid,'$name','$address','$mobile','$email','$note')";
$con->query($query);
$query="select id from orders order by id desc limit 1";
$orderid=mysqli_fetch_array($con->query($query))['id'];
foreach($_SESSION['cart'] as $key=>$value){
    $productid=$key;
    $number=$value;
    $query="select productPrice from products where id=$key";
    $productPrice=mysqli_fetch_array($con->query($query))['productPrice'];
    $query="insert orderdetail values($productid,$orderid,$number,$productPrice)";
    $con->query($query);

}
unset($_SESSION['cart']);
header("location:?option=ordersuccess");
}
?>


<h1 style="  text-align: center; ">ĐẶT HÀNG</h1>
<form method="post">
<h2 style="  text-align: center; ">THÔNG TIN NGƯỜI NHẬN HÀNG</h2>
<section style="  text-align: center; ">
    <section>
        
    </section>
        <section>
            <label >HỌ TÊN:</label><input name="name" value="<?=$users['fullname']?>">
        </section>
        <section>
            <label >ĐIỆN THOẠI:</label><input type="tel" name="mobile" value="<?=$users['mobile']?>">
        </section>
        <section>
            <label >ĐỊA CHỈ:</label><textarea name="address"  rows="3"><?=$users['address']?></textarea>
        </section>
        <section>
            <label >EMAIL:</label><input type="email" name="email"  value="<?=$users['email']?>">
        </section>
        <section>
            <label >GHI CHÚ:</label><textarea name="note" id=""  rows="3"></textarea>
        </section>
    </section>
   <h2 style="  text-align: center; "> CHỌN HÌNH THỨC THANH TOÁN:</h2>
  <section style="  text-align: center; ">
  <?php
   $query="select*from ordermethod where status";
   $result=$con->query($query);
   ?>
   <select name="ordermethodid" >
       <?php foreach($result as $item):?>
        <option value="<?=$item['id']?>"><?=$item['name']?></option>
        <?php endforeach;?>
   </select>
   <section>
       <input type="submit" value="ĐẶT HÀNG" style="margin-top:20px">
   </section>
  </section>
  
 </form>