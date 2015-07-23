<?php include_partial("partial/bannerHome");?>

<?php include_partial('page/top5', array());?>

<?php $i=0;?>
<?php foreach($pager->getResults() as $rs):?>
    <?php include_partial('page/box', array('rs'=>$rs));?>
    <?php include_partial('partial/bannerMiddle', array('i'=>++$i));?>
<?php endforeach;?>
<?php unset($i);?>

<?php echo pager($pager, 'main/home')?>
<?php unset($pager);?>
