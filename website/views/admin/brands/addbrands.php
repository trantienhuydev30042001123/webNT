<?php
 if(isset($_POST['brandname'])):
    $brandname = $_POST['brandname'];
    $query = "select*from brands where brandname='$brandname'";
    $result = $con->query($query);
    if(mysqli_num_rows($result) > 0):
        $alert="Tên đã có sẵn vui lòng  kiểm tra lại!";
    else:
        $brandstatus = $_POST['brandstatus'];
        $query = "insert brands (brandname,brandstatus) value('$brandname','$brandstatus')";
        $con->query($query);
        header("location: ?option=showbrands");
    endif;
endif;

?>

<h1 style="text-align: center;"> THÊM LOẠI SẢN PHẨM</h1>
<section><?=isset($alert)?$alert:''?></section>
<section style="text-align: center;">
    <form method="post">
        <section>
            <label >TÊN SẢN PHẨM:</label><input type="text" name="brandname" required>

        </section><br>
        <section>
             <label >STATUS:</label><input type="radio" name="brandstatus" value="1">Active <input type="radio" name="brandstatus" value="0"> UnActive 
            </section><br>
            <section>
                <input class="btn btn-primary" type="submit" value="ADD"> <input class="btn btn-danger" type="button" value="<< BACK" onclick="location='?option=showbrands';"></section>
            </section>
    </form>
</section>
