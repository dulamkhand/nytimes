<?php $host = sfConfig::get('app_host');?>
<!--breadcrumb-->
<a href="<?php echo url_for('main/home')?>" class="left h3" style="margin:0 0 5px 0;">Нүүр</a> 
<span class="left" style="margin:3px 5px 5px 7px;">&raquo; </span>
<h3 class="left" style="width:150px;margin:0 0 5px 0;cursor:default;">Их сэтгэгдэлтэй</h3>
<br clear="all">

<?php $i = 0;?>
<?php foreach($pager->getResults() as $rs):?>
    <?php include_partial('page/box', array('rs'=>$rs, 'host'=>$host));?>
  	<?php include_partial('partial/bannerMiddle', array('i'=>++$i));?>
<?php endforeach;?>

<?php echo pager($pager, 'page/byNbComment')?>
