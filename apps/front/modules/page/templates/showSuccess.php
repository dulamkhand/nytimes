<?php $host = sfConfig::get('app_host')?>
<meta property=og:title content="<?php echo $title = GlobalLib::clearOutput(GlobalLib::clearQuote($rs))?>"/>
<meta property=og:site_name content="<?php echo sfConfig::get('app_webname')?>"/>
<meta property=og:url content="<?php echo $url = $host.url_for("page/show?route=".$rs->getRoute())?>"/>
<meta property=og:description content="<?php echo $intro = GlobalLib::clearOutput(GlobalLib::clearQuote($rs->getIntro()))?>"/>
<meta property=og:image content="<?php echo $host.$rs->getCover()?>"/>
<link rel="image_src" href="<?php echo $host.$rs->getCover()?>"/>

<!--content & images-->
<div style="background:#fff;width:600px;padding:0;line-height:30px;" class="left">
    <h1 style="margin:0 0 5px 0;font-size:20px;line-height:30px;border-bottom:1px dotted #e2e2e2;">
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
</div>

<!--navigations-->
<?php include_partial('navs', array('rs'=>$rs));?>

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
