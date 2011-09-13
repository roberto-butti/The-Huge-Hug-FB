
	<h1><?php echo $message["title"];?></h1>
	<div id="body">
		<p><?php echo $message["description"];?></p>
		<code><?php echo $message["caption"];?></code>
    <img src="<?php echo $message["picture"];?>" style="vertical-align: top">
    <img width="480" style="vertical-align: top" src="https://chart.googleapis.com/chart?chs=480x480&cht=qr&chl=<?php echo $url_to_share;?>" />
	</div>

	
