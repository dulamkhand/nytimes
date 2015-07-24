<?php $rss = Doctrine::getTable('Content')->doFetchArray(array('title', 'route', 'cover', 'intro', 'created_at'), 
    						 //array('limit'=>5, 'orderBy'=>'nb_views DESC, sort DESC', 'createdAtGt'=>date('Y-m-d H:i', strtotime('-10 week'))));
    						 array('limit'=>10, 'orderBy'=>'nb_views DESC, sort DESC'));?>
<?php $i = 0?>
<?php foreach ($rss as $rs):?>
    <a href="<?php echo url_for('page/show?route='.$rs['route'])?>" class="left" style="padding:10px 0;border-bottom:1px dotted #dedede;">
    		<?php $cover = str_replace("t600-", "t240-", $rs['cover'])?>
    		<?php echo image_tag($cover, array('style'=>'width:75px;float:left;margin:3px 5px 0 0;'))?>
    		<span class="left" style="width:150px;">
    				<h1 style="margin:0;text-transform:none;"><?php echo $rs['title']?></h1>
    				<span class="details" style="margin:0"><?php echo time_ago($rs['created_at'])?></span>
    		</span>
    </a>
    <br clear="all">
<?php endforeach;?>
<br clear="all">