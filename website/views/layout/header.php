<section style="text-align: center;line-height: 100px;background: #C0C0C0;">
	<form method="post">
		<input type="hidden" name="option" value="showproduct">
		<input type="search" name="keyword" value="<?=isset($_GET['keyword'])?($_GET['keyword']):""?>"> <input type="submit" value="search">
	</form>
</section>