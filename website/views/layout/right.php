<?php
$query = "select*from prices where priceStatus=1";
$result = $con->query($query);
?>
<nav class ="menu-right">
    <?php foreach($result as $item):?>
        <a href="?option=showproduct&from=<?=$item['priceFrom']?>&to=<?=$item['priceTo']?>"><?=$item['priceFrom'].' - '.$item['priceTo']?> VND</a>
    <?php endforeach;?>
</nav>