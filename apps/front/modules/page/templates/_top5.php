<?php $rss = Doctrine::getTable('Content')->doFetchArray(array('title', 'route', 'cover', 'intro'), 
    						 //array('limit'=>5, 'orderBy'=>'nb_views DESC, sort DESC', 'createdAtGt'=>date('Y-m-d H:i', strtotime('-10 week'))));
    						 array('limit'=>5, 'orderBy'=>'nb_views DESC, sort DESC'));?>
<?php $i = 0?>
<div style="margin:0 0 10px 0;">
    <?php foreach ($rss as $rs):?>
        <a href="<?php echo url_for('page/show?route='.$rs['route'])?>" class="left" style="padding:5px 0 5px 5px;">
        		<?php $cover = str_replace("t600-", "t240-", $rs['cover'])?>
        		<?php echo image_tag($cover, array('style'=>'width:75px;float:left;margin:3px 5px 0 0;'))?>
        		<span class="left" style="width:150px;line-height:17px;font-size:16px;"><h1><?php echo $rs['title']?></h1></span>
        </a>
        <br clear="all">
    <?php endforeach;?>
</div>
<br clear="all">