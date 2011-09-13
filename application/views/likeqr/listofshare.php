<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="utf-8">
	<title>URLalo al mondo!</title>
<?php
echo link_tag('assets/css/main.css');
?>
	<style type="text/css">
	</style>
</head>
<body>

<div id="container">
	<h1>URLalo al mondo</h1>

	<div id="body">
		<p>URLa al mondo dove sei, cosa fai, come stai!</p>
    <ul>
 <?php foreach ($messages as $key => $m) {
   
   echo "<li>".anchor("likeqr/show/".$key, $m["title"], array('title' => $m["caption"]))."</li>";
   
 }
 ?>
    </ul>
	</div>

	<p class="footer">URLalo al mondo!</p>
</div>

</body>
</html>