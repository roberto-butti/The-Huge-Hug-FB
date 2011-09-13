<div data-role="content">
		<p>URLa al mondo dove sei, cosa fai, come stai!</p>
    <ul>
 <?php foreach ($messages as $key => $m) {
   
   echo "<li>".anchor("likeqr/show/".$key, $m["title"], array('title' => $m["caption"]))."</li>";
   
 }
 ?>
    </ul>
</div>