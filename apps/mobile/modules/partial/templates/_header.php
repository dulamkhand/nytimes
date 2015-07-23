<?php $host = sfConfig::get('app_host')?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=877037815640906&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div id="header">
   <div class="wrapper">
        <a class="left" style="cursor:pointer;background:url(<?php echo $host?>images/icons/list.png) no-repeat;
                width:30px;height:30px;margin:10px 2px 0 1px;" id="list">
        </a>
        <a href="<?php echo url_for('@homepage')?>" class="left">
            <?php echo image_tag('logo350.png', array('style'=>'max-width:350px;', 'height'=>45))?>
        </a>
        <div class="right" style="margin:11px 0 0 0;position:relative;">
            <a href="https://www.facebook.com/baavar.mn" class="left" target="_blank"
                style="background:url(<?php echo $host?>images/icons/socials/fb.png) no-repeat;width:32px;height:32px;margin:0 1px 0 0;">&nbsp;</a>
            <a href="https://twitter.com/baavar_mn" class="left" target="_blank"
                style="background:url(<?php echo $host?>images/icons/socials/tw.png) no-repeat;width:32px;height:32px;margin:0 1px 0 0;">&nbsp;</a>
            <a href="<?php echo url_for('main/search?start=1')?>" class="left"
                style="background:url(<?php echo $host?>images/icons/socials/sr.png) no-repeat;width:32px;height:32px;">&nbsp;</a>
        </div>
        <br clear="all">
    </div><!--wrapper-->
    
    <div id="mainmenu">
        <div class="wrapper">
            <ul>
                <li><a href="<?php echo url_for('page/byNbView')?>" style="width:80%;background:none;">Их үзсэн</a></li>
                <li><a href="<?php echo url_for('page/byNbComment')?>" style="width:90%;">Их сэтгэгдэлтэй</a></li>
                <li><a href="<?php echo url_for('page/archive')?>" style="width:90%;">Архив</a></li>
            </ul>
            <br clear="all">
            <!--category-->
            <ul id="categorylist" dir="none" style="display:none;">
                <?php $paramCat = $sf_params->get('categoryRoute')?>
                <?php $cats = GlobalTable::doFetchArray('Category', array('route', 'name'), array('limit'=>50));?>
                <?php foreach ($cats as $cat):?>
                    <li>
                        <a href="<?php echo url_for('page/index?categoryRoute='.$cat['route'])?>" class="<?php if($cat['route'] == $paramCat) echo 'current'?>">
                            <?php echo $cat['name']?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div><!--wrapper-->
    </div><!--mainmenu-->
</div><!--header-->

<script type="text/javascript">
/*mainmenu sticky*/
$(document).ready(function(){
    $("#mainmenu").sticky({topSpacing:0});
});

/*category*/
$('#list').click(function(){
    if($("#categorylist").attr('dir') == 'none') {
        $("#categorylist").slideDown();
        $("#categorylist").attr('dir', 'block');
    } else {
        $("#categorylist").slideUp();
        $("#categorylist").attr('dir', 'none');
    }
});
$('html').click(function(e){
		if(e.target.id !== "list") {
				$("#categorylist").slideUp();
		    $("#categorylist").attr('dir', 'none');	
		}
});
</script>