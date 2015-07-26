<h1 style="margin:0;border-top:2px solid #000;border-bottom:1px solid #e2e2e2;padding:5px 0 5px 2px;">Ойролцоо нийтлэлүүд</h1>
<?php $rss = Doctrine::getTable('Content')->doFetchArray(array('title', 'route', 'cover', 'created_at'), 
              array('idO'=>$id, /*'categoryIdIn'=>array_keys($categoryIds),*/ 'limit'=>10, 'orderBy'=>'RAND()'));?>
<?php foreach ($rss as $rs):?>
    <a href="<?php echo url_for('page/show?route='.$rs['route'])?>" class="left" style="padding:10px 0;border-bottom:1px dotted #dedede;">
    		<?php $cover = str_replace("t600-", "t240-", $rs['cover'])?>
    		<?php echo image_tag($cover, array('style'=>'width:75px;float:left;margin:3px 5px 0 0;'))?>
    		<span class="left" style="width:130px;">
    				<h1 style="margin:0;text-transform:none;"><?php echo $rs['title']?></h1>
    				<span class="details" style="margin:0"><?php echo time_ago($rs['created_at'])?></span>
    		</span>
    </a>
    <br clear="all">
<?php endforeach;?>
<br clear="all">