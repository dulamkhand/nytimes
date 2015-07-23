<?php $host = sfConfig::get('app_host')?>
<meta property=og:image content="<?php echo $host.$rs->getCover()?>"/>
<link rel="image_src" href="<?php echo $host.$rs->getCover()?>"/>

<!--breadcrumb-->
<h3 class="left" style="width:65px;margin:0 0 5px 0;cursor:default;">Ангилал: </h3>
<?php $i=0; $nb = sizeof($rs->getCategoryContent());?>
<?php $categoryIds = array()?>
<?php foreach ($rs->getCategoryContent() as $catcon):?>
		<a href="<?php echo url_for('page/index?categoryRoute='.$catcon->getCategory()->getRoute())?>" class="h3 left" style="color:#0677cf;margin:0 0 5px 6px;">
				<?php echo $catcon->getCategory()?><?php echo (++$i < $nb) ? ',' : '';?>
		</a>
	 <?php $categoryIds[] = $catcon->getCategoryId()?>
<?php endforeach?>
<br clear="all">

<!--content & images-->
<div style="background:#fff;width:98%;padding:15px;line-height:30px;border-top:2px solid #0677cf;">
    <h1 style="border-bottom:1px solid #dedede;padding:0 0 10px 0;margin:0;">
        <?php echo GlobalLib::clearOutput($rs)?>
    </h1>
    <div style="border-bottom:1px solid #dedede;color:#888;padding:4px 0;">
        <?php include_partial('page/icons', array('rs'=>$rs));?>
        <div class="left"><?php include_partial('page/share', array('url'=>$host."/page/show?route=".$rs->getRoute()));?></div>
        <br clear="all">
    </div>
    
    <?php echo htmlspecialchars_decode(nl2br($rs->getIntro()))?>
    <br clear="all">
    <?php 
        $i = 0;
        $images = GlobalTable::doFetchArray('Image', array('folder', 'filename', 'description'), 
                  array('contentId'=>$rs->getId(), 'isActive'=>'all', 'orderBy'=>'sort ASC'));
        $total = sizeof($images);
        foreach ($images as $image) {
            echo image_tag('/u/'.$image['folder'].'/t750-'.$image['filename'], array('style'=>'width:98%;margin:10px 0;'));
            echo '<br clear="all">';
            echo $image['description'];
            if(++$i < $total) echo '<hr style="border:0;border-bottom:1px dotted #ccc;margin:7px 0;">';
            include_partial('partial/bannerMiddle', array('i'=>$i, 'showPage'=>true));
        }
    ?>
    <?php echo htmlspecialchars_decode(nl2br($rs->getBody()))?>
    <br clear="all">
    <div style="border-top:1px solid #dedede;padding:10px 0 0 0;margin:20px 0 0 0;">
    		<?php include_partial('page/icons', array('rs'=>$rs));?>
		    <div class="fb-like right" style="margin:0 16px 0 0;" data-href="<?php echo $url?>" 
    				 data-send="false" colorscheme="dark" data-layout="button_count" data-width="20" 
		        data-show-faces="false"></div>
		    <br clear="all">
		</div>
    <div style="border-bottom:1px solid #dedede;color:#888;margin:5px 0 30px 0;padding:4px 0 8px 0;">
        <?php include_partial('page/share', array('url'=>$host."/page/show?route=".$rs->getRoute()));?>
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
