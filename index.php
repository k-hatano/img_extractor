<?php 
	$url = isset($_GET["url"]) ? $_GET["url"] : "";
?>

<form action="index.php" method="GET">
<input type="url" name="url" value="<?php echo $url ?>" size="60" /><input type="submit" value="Extract" />
</form>
<hr />

<?php

if (strlen($url) > 0) {
	$contents = file_get_contents($url);

	if ($contents == false) {
		echo "Some error occurred.";
		exit;
	}
	preg_match("/(http[^ \\\"]*?\.(jpg))/", $contents, $result, PREG_OFFSET_CAPTURE);

	if (count($result) == 0 || count($result[0]) == 0) {
		echo "Not found.";
	} else {
		echo "<input type='text' value='" . htmlspecialchars($result[0][0]) ."' size='60' /><br />";
		echo "<img src='" . htmlspecialchars($result[0][0]) ."' />";
	}
}

