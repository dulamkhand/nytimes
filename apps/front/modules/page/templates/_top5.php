<?php $host = sfConfig::get('app_host')?>
<?php $rss = Doctrine::getTable('Content')->doFetchArray(array('title', 'route', 'cover', 'intro'), 
    						 array('limit'=>4, 'orderBy'=>'nb_views DESC, sort DESC', 'createdAtGt'=>date('Y-m-d H:i', strtotime('-1 week'))));?>
<?php $i = 0?>
<div style="margin:0 0 10px 0;" class="left box">
    <?php foreach ($rss as $rs):?>
		<div class="left" style="margin:0 <?php echo ++$i == 4 ? 0 : 7?>px 0 0;width:182px;height:300px;position:relative;background:url('<?php echo $host.$rs['cover']?>') 50% 10% no-repeat;background-size:350px 300px;">
			<a href="<?php echo url_for('page/show?route='.$rs['route'])?>" class="left" style="position:absolute;bottom:0;left:0;width:172px;min-height:65px;background:rgba(0,0,0,0.6);padding:5px;">
        		<?php //$cover = str_replace("t750-", "t240-", $rs['cover'])?>
        		<?php //echo image_tag($rs['cover'], array('style'=>'width:182px;height:300px;'))?>
				<!--<div style="position:absolute;bottom:0;left:0;background:rgba(0,0,0,0.6);padding:5px;min-height:65px;">-->
					<span style="color:#fff"><?php echo $rs['title']?></span>
				<!--</div>-->
			</a>
		</div>
    <?php endforeach;?>
</div>
<br clear="all">