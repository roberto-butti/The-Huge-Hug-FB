	<h1><?php echo $message["title"]?></h1>

	<div id="body">
		<p><?php echo $message["description"]?></p>
		<code><?php echo $message["caption"]?>
      <br />
    <?php $url = urlencode($message["url"]);?>
    <iframe src="http://www.facebook.com/plugins/like.php?app_id=205696889494493&amp;href=<?php echo $url;?>&amp;send=false&amp;layout=box_count&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=90" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:90px;" allowTransparency="true"></iframe>
    </code>
    <img  src="<?php echo $message["picture"]?>" title="<?php echo $message["title"]?>" />
	</div>

