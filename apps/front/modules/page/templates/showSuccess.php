<?php $host = sfConfig::get('app_host')?>
<meta property=og:title content="<?php echo $title = GlobalLib::clearOutput(GlobalLib::clearQuote($rs))?>"/>
<meta property=og:site_name content="<?php echo sfConfig::get('app_webname')?>"/>
<meta property=og:url content="<?php echo $url = $host.url_for("page/show?route=".$rs->getRoute())?>"/>
<meta property=og:description content="<?php echo $intro = GlobalLib::clearOutput(GlobalLib::clearQuote($rs->getIntro()))?>"/>
<meta property=og:image content="<?php echo $host.$rs->getCover()?>"/>
<meta property=fb:app_id content="824938190895781"/>
<link rel="image_src" href="<?php echo $host.$rs->getCover()?>"/>

<!--content & images-->
<div style="background:#fff;width:600px;padding:0;line-height:30px;" class="left">
    <h1 style="margin:0 0 5px 0;font-size:20px;line-height:30px;">
        <?php echo $title?>
    </h1>
    <?php echo $intro?>
    <br clear="all">
    <?php 
    		$i = 0;
        $images = GlobalTable::doFetchArray('Image', array('folder', 'filename', 'description'), 
                  array('contentId'=>$rs->getId(), 'isActive'=>'all', 'orderBy'=>'sort ASC', 'limit'=>100));
        $total = sizeof($images);
        foreach ($images as $image) {
            echo image_tag('/u/'.$image['folder'].'/t600-'.$image['filename'], array('style'=>'max-width:720px;margin:10px 0;'));
            echo '<br clear="all">';
            echo GlobalLib::clearOutput($image['description']);
            if(++$i < $total) echo '<hr style="border:0;border-bottom:1px dotted #ccc;margin:7px 0;">';
            include_partial('partial/bannerMiddle', array('i'=>$i, 'showPage'=>true));
        }
    ?>
    <?php echo GlobalLib::clearOutput($rs->getBody())?>
    <br clear="all">
    
    
    <!--prev and next-->
    <?php include_partial('prev_next', array('id'=>$rs->getId()));?>
</div>

<div class="left" style="width:210px;border:0px solid #e2e2e2;margin:0 0 0 15px;padding:0 10px;">
		<ul class="navigation">
				<li>
        		<span class="details left" style="margin:0;">Ангилал: &nbsp;</span>
						<?php $i=0; $nb = sizeof($rs->getCategoryContent());?>
						<?php $categoryIds = array()?>
						<?php foreach ($rs->getCategoryContent() as $catcon):?>
								<a href="<?php echo url_for('page/index?categoryRoute='.$catcon->getCategory()->getRoute())?>" class="left details" style="text-decoration:underline;">
										<?php echo $catcon->getCategory()?><?php echo (++$i < $nb) ? ',' : '';?>
								</a>
							 <?php $categoryIds[$catcon->getCategoryId()] = $catcon->getCategoryId()?>
						<?php endforeach?>
						<br clear="all">
				</li>
				<li>
        		<span class="details" style="margin:0;">Нэмэгдсэн: <?php echo time_ago($rs->getCreatedAt())?></span>
				</li>
				<li>
						<span class="details" style="margin:0;">Нээгдсэн:</span>
        		<span class="details" style="margin:-1px 0 0 2px;font-size:14px;"><?php echo $rs->getNbViews()?></span>
        </li>
				<li>
						<span class="details" style="margin:0;">Сэтгэгдэл:</span>
        		<span class="details" style="margin:-1px 0 0 2px;font-size:14px;"><?php echo $rs->getNbComment()?></span>	
				</li>
				<li>
						<!--fb like-->
						<?php $host = sfConfig::get('app_host')?>
						<div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false" 
    						 data-href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url?>&amp;title=<?php echo $title?>"></div>
				</li>
				<li>
						<!--fb share-->
						<div class="fb-share-button" data-layout="button_count"
								 data-href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url?>&amp;title=<?php echo $title?>"></div>
				</li>
				<li>
						<!--fb send-->
						<div class="fb-send" data-href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url?>&amp;title=<?php echo $title?>"></div>
				</li>
				<li>
						<!--tweet-->
						<a class="twitter-share-button" href="https://twitter.com/share?url=<?php echo $url?>&amp;via=<?php echo sfConfig::get('app_domain');?>&amp;text=<?php echo $title?>">Tweet</a>
				</li>
		</ul><!--navigation-->
		<br clear="all">
		<br clear="all">
		
		<!--similars-->
		<?php include_partial('similars', array('id'=>$rs->getId(), 'categoryIds'=>$categoryIds));?>
		<br clear="all">
</div>

<br clear="all">

<!--comments-->
<?php include_partial('comment/index', array('objectType'=>'content', 'objectId'=>$rs->getId())) ?>

<script type="text/javascript">
</script>

<?php unset($host)?>
<?php unset($rs)?>
<?php unset($images)?>
<?php unset($url)?>
<?php unset($title)?>
<?php unset($intro)?>
<?php unset($i)?>
<?php unset($nb)?>
<?php unset($total)?>
<?php unset($categoryIds)?>
