<div style="position:fixed;left:90%;top:371px;z-index:1000;">
		<div class="fb-like" data-href="https://www.facebook.com/<?php echo sfConfig::get('app_facebook')?>" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true" data-width="65"
				 style="border-bottom:1px dashed #ccc;margin:0 0 6px 3px;padding:0 0 7px;"></div>
		<!--<div class="fb-like" data-href="https://www.facebook.com/<?php echo sfConfig::get('app_facebook')?>" data-width="100" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>-->
		<br clear="all">
		
  	<a class="twitter-share-button" href="https://twitter.com/share" data-related="twitterdev" data-count="vertical" 
		 	 data-url="<?php echo $host?>" data-via="<?php echo sfConfig::get('app_webname')?>" data-text="<?php echo sfConfig::get('app_webname')?>">Tweet</a>
		<script type="text/javascript">
		window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));
		$('.twitter-share-button').attr('style', 'width:56px!important;');
		</script>
</div>
