<?php include_partial("partial/bannerHome");?>

<?php $i=0;?>
<?php foreach($pager->getResults() as $rs):?>
    <?php include_partial('page/boxSmall', array('rs'=>$rs));?>
    <?php include_partial('partial/bannerMiddle', array('i'=>++$i));?>
<?php endforeach;?>
<?php unset($i);?>

<?php echo pager($pager, 'main/home')?>
<?php unset($pager);?>
