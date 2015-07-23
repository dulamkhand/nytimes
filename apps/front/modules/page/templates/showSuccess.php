<?php $host = sfConfig::get('app_host')?>
<meta property=og:title content="<?php echo $title = GlobalLib::clearOutput(GlobalLib::clearQuote($rs))?>"/>
<meta property=og:site_name content="<?php echo sfConfig::get('app_webname')?>"/>
<meta property=og:url content="<?php echo $url = $host.url_for("page/show?route=".$rs->getRoute())?>"/>
<meta property=og:description content="<?php echo $intro = GlobalLib::clearOutput(GlobalLib::clearQuote($rs->getIntro()))?>"/>
<meta property=og:image content="<?php echo $host.$rs->getCover()?>"/>
<meta property=fb:app_id content="824938190895781"/>
<link rel="image_src" href="<?php echo $host.$rs->getCover()?>"/>

<!--breadcrumb-->
<h3 class="left" style="width:65px;margin:0 0 5px 0;cursor:default;">Ангилал: </h3>
<?php $i=0; $nb = sizeof($rs->getCategoryContent());?>
<?php $categoryIds = array()?>
<?php foreach ($rs->getCategoryContent() as $catcon):?>
		<a href="<?php echo url_for('page/index?categoryRoute='.$catcon->getCategory()->getRoute())?>" class="h3 left" 
				style="color:#0677cf;margin:0 0 5px 6px;width:<?php echo mb_strlen($catcon->getCategory())*10/2;?>px">
				<?php echo $catcon->getCategory()?><?php echo (++$i < $nb) ? ',' : '';?>
		</a>
	 <?php $categoryIds[$catcon->getCategoryId()] = $catcon->getCategoryId()?>
<?php endforeach?>
<br clear="all">

<!--content & images-->
<div style="background:#fff;width:720px;padding:15px;line-height:30px;border-top:2px solid #0677cf;">
    <h1 style="border-bottom:1px solid #dedede;padding:0 0 10px 0;margin:0;font-weight:bold;letter-spacing:0px;">
        <?php echo $title?>
    </h1>
    <div style="border-bottom:1px solid #dedede;color:#888;padding:4px 0;">
        <?php include_partial('page/icons', array('rs'=>$rs));?>
        <div class="right"><?php include_partial('page/share', array('url'=>$url, 'title'=>$title));?></div>
        <br clear="all">
    </div>
    
    <?php echo $intro?>
    <br clear="all">
    <?php 
    		$i = 0;
        $images = GlobalTable::doFetchArray('Image', array('folder', 'filename', 'description'), 
                  array('contentId'=>$rs->getId(), 'isActive'=>'all', 'orderBy'=>'sort ASC', 'limit'=>100));
        $total = sizeof($images);
        foreach ($images as $image) {
            echo image_tag('/u/'.$image['folder'].'/t750-'.$image['filename'], array('style'=>'max-width:720px;margin:10px 0;'));
            echo '<br clear="all">';
            echo GlobalLib::clearOutput($image['description']);
            if(++$i < $total) echo '<hr style="border:0;border-bottom:1px dotted #ccc;margin:7px 0;">';
            include_partial('partial/bannerMiddle', array('i'=>$i, 'showPage'=>true));
        }
    ?>
    <?php echo GlobalLib::clearOutput($rs->getBody())?>
    <br clear="all">
    <div style="border-top:1px solid #dedede;border-bottom:1px solid #dedede;color:#888;margin:30px 0 30px 0;padding:4px 0;">
				<div class="left" style="margin:7px 0 0 0;width:90px;">
				    <div class="fb-like" data-href="<?php echo $url?>" data-send="false" colorscheme="dark" data-layout="button_count" data-width="20" 
				        data-show-faces="false"></div>
				</div>
    		<div class="right"><?php include_partial('page/share', array('url'=>$url, 'title'=>$title));?></div>
        <br clear="all">
    </div>
    
    <!--prev and next-->
    <?php include_partial('prev_next', array('id'=>$rs->getId()));?>
</div>
<br clear="all">

<!--similars-->
<?php include_partial('similars', array('id'=>$rs->getId(), 'categoryIds'=>$categoryIds));?>

<!--random-->
<?php include_partial('random', array('id'=>$rs->getId(), 'categoryIds'=>$categoryIds));?>

<!--comments-->
<?php include_partial('comment/index', array('objectType'=>'content', 'objectId'=>$rs->getId())) ?>

<?php //include_partial('love/js', array());?>

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
