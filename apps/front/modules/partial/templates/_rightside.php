<div id="rightside">
    <!--featured news-->
    <?php //$rs = Doctrine::getTable('Content')->doFetchOne(array('title', 'route', 'cover', 'intro'), array('isFeatured'=>'1'));?>
    <?php //if($rs) include_partial("page/featured", array('rs'=>$rs));?>

    <!--banner right top-->    
    <?php $rs = GlobalTable::doFetchOne('Banner', array('path, mobile_img, ext, link, target'), array('position'=>'right-top', 'limit'=>1));?>
    <?php if($rs):?>
    		<div style="margin:0 0 10px 0;">
				    <?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>240, 'height'=>600));?>
    		</div>
    <?php endif?>
    
     <!--category-->
    <?php if($sf_params->get('action') != 'home') include_partial("partial/category", array());?>
    
    <!--poll-->
    <?php //$rs = GlobalTable::doFetchOne('Poll', array('id, title, body'), array('isActive'=>'1'))?>
	  <?php //if($rs) include_partial('poll/form', array('rs'=>$rs, 'width'=>180));?>
    
    <div class="fb-page" data-href="https://www.facebook.com/<?php echo sfConfig::get('app_facebook')?>" data-width="240" data-small-header="true"
	  		 data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
    		<div class="fb-xfbml-parse-ignore">
	    		<blockquote cite="https://www.facebook.com/<?php echo sfConfig::get('app_facebook')?>">
	    				<a href="https://www.facebook.com/<?php echo sfConfig::get('app_facebook')?>">Facebook</a>
	    		</blockquote>
    		</div>
    </div>
    <br clear="all">
    <br clear="all">
    
    <!--top news of all the time-->
    <h1 style="margin:0;border-top:2px solid #000;border-bottom:1px solid #e2e2e2;padding:5px 0 5px 2px;">Шилдэг нийтлэлүүд</h1>
    <?php $rss = Doctrine::getTable('Content')->doFetchArray(array('title', 'route', 'cover', 'created_at'), array('limit'=>10, 'orderBy'=>'nb_views DESC, sort DESC'));?>
    <?php foreach ($rss as $rs):?>
    		<?php include_partial('page/box_s', array('rs'=>$rs));?>
    <?php endforeach;?>
    <br clear="all">

    <!--banner right middle-->
    <?php $rs = GlobalTable::doFetchOne('Banner', array('path, mobile_img, ext, link, target'), array('position'=>'right-middle', 'limit'=>1));?>
    <?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>240, 'height'=>600));?>
	
</div><!--rightside-->