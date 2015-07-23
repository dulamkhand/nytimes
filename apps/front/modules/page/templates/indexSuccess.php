<?php $categoryRoute = GlobalLib::clearInput($sf_params->get('categoryRoute'));?>

<!--breadcrumb-->
<a href="<?php echo url_for('main/home')?>" class="left h3" style="margin:0 0 5px 0;">Нүүр</a> 
<span class="left" style="margin:3px 5px 5px 7px;">&raquo; </span>
<h3 class="left" style="width:80px;margin:0 0 5px 0;cursor:default;">Ангилал: </h3>
<a href="<?php echo url_for('page/index?categoryRoute='.$categoryRoute)?>" class="left h3" style="color:#0677cf;margin:0 0 5px 0;width:400px;">
	 <?php echo $category['name']?>
</a>
<br clear="all">

<?php $i=0;?>
<?php foreach($pager->getResults() as $rs):?>
    <?php include_partial('page/box', array('rs'=>$rs));?>
    <?php include_partial('partial/bannerMiddle', array('i'=>$i));?>
<?php endforeach;?>

<?php echo pager($pager, 'page/index?categoryRoute='.$categoryRoute)?>
