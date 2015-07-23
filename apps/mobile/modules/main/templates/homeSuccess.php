<?php $host = sfConfig::get('app_host');?>
<?php $i=0;?>
<?php foreach($pager->getResults() as $rs):?>
    <?php include_partial('page/box', array('rs'=>$rs, 'host'=>$host));?>
		<?php include_partial('partial/bannerMiddle', array('i'=>++$i));?>
<?php endforeach;?>

<?php echo pager($pager, 'main/home')?>
