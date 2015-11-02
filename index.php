<?php
require_once __DIR__ . "/WebPageFilter.php";
$content = "";
if(isset($_POST['url'])){
	$webFilter = new WebPageFilter($_POST['url']);
	$content = $webFilter->getContent();
}

?>
<html>
	<body>
		<form method="post" action="">
			<input type="text" name="url" value="<?php echo $_POST['url']; ?>">
			<input type="submit">
		</form>
		<hr/>
		<?php echo $content; ?>
	</body>
</html>
