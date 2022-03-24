<?php
$chuaxuly=mysqli_num_rows($con->query("select*from orders where status=1"));
$dangxuly=mysqli_num_rows($con->query("select*from orders where status=2"));
$daxuly=mysqli_num_rows($con->query("select*from orders where status=3"));
$huy=mysqli_num_rows($con->query("select*from orders where status=4"));
?>
<table class="table table-bordered tbl-admin">
    <tbody>
        <tr>
            <td width=25% >xin chào: <?=$_SESSION['admin']?> <br> <a href="?option=logout">logout</a></td>
        </tr>
        <tr>
            <td  >
                <nav>
                <section><a href="?option=showbrands">CÁC LOẠI SẢN PHẨM</a></a></section>
                    &nbsp;
                    &nbsp;
                <section><a href="?option=products">SẢN PHẨM</a></a></section>
                &nbsp;
                    <section>ĐƠN HÀNG
                        <section><a href="?option=order&status=1">ĐƠN HÀNG CHƯA XỬ LÝ[<span style="color:red" ><?=$chuaxuly?></span>]</a></section>
                        <section><a href="?option=order&status=2">ĐƠN HÀNG ĐANG XỬ LÝ[<span style="color:red" ><?=$dangxuly?></span>]</a></section>
                        <section><a href="?option=order&status=3">ĐƠN HÀNG ĐÃ XỬ LÝ[<span style="color:red" ><?=$daxuly?></span>]</a></section>
                        <section><a href="?option=order&status=4">ĐƠN HÀNG HỦY[<span style="color:red" ><?=$huy?></span>]</a></section>
                    </section>
                </nav>
            </td>
            <td><?php include"routes-admin.php"; ?></td>
        </tr>
    </tbody>
</table>
