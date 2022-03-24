<?php 
$query = "select*from brands where brandstatus=1";
$result = $con->query($query);
?>
<nav class="menu-left">
	<?php foreach($result as $item):?>
	<a href="?option=showproduct&brandid=<?=$item['id']?>"><?=$item['brandname']?></a>
	<?php endforeach;?>
</nav>