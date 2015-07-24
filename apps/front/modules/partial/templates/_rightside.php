<div id="rightside">
    <!--featured news-->
    <?php //$rs = Doctrine::getTable('Content')->doFetchOne(array('title', 'route', 'cover', 'intro'), array('isFeatured'=>'1'));?>
    <?php //if($rs) include_partial("page/featured", array('rs'=>$rs));?>

    <!--banner right top-->    
    <?php $rs = GlobalTable::doFetchOne('Banner', array('path, mobile_img, ext, link, target'), array('position'=>'right-top', 'limit'=>1));?>
    <?php if($rs):?>
    		<div style="margin:0 0 10px 0;">
				    <?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>240, 'height'=>400));?>
    		</div>
    <?php endif?>
    
    <!--poll-->
    <?php //$rs = GlobalTable::doFetchOne('Poll', array('id, title, body'), array('isActive'=>'1'))?>
	  <?php //if($rs) include_partial('poll/form', array('rs'=>$rs, 'width'=>180));?>
    
    <!--random news-->
    <?php $rss = Doctrine::getTable('Content')->doFetchArray(array('title', 'route', 'cover'), array('limit'=>5, 'orderBy'=>'RAND()'));?>
    <?php foreach ($rss as $rs):?>
        <a href="<?php echo url_for('page/show?route='.$rs['route'])?>" style="margin:0 0 15px 0;float:left;">
            <h1 style="line-height:24px;margin:0;padding:5px 10px;background:#fff;border-top:2px solid #0677cf;">
                <?php echo $rs['title']?>
            </h1>
            <?php $cover = str_replace("t600-", "t240-", $rs['cover'])?>
            <?php echo image_tag($cover, array('style'=>'max-width:240px;'))?>
        </a>
    <?php endforeach;?>
    <br clear="all">

    <!--banner right middle-->
    <?php $rs = GlobalTable::doFetchOne('Banner', array('path, mobile_img, ext, link, target'), array('position'=>'right-middle', 'limit'=>1));?>
    <?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>240, 'height'=>600));?>
	
</div><!--rightside-->