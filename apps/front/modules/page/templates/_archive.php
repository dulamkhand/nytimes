<?php $host = sfConfig::get('app_host');?>
<?php foreach($pager->getResults() as $rs):?>
    <?php include_partial('page/boxSmall', array('rs'=>$rs, 'host'=>$host));?>
<?php endforeach;?>
<?php echo pager($pager, 'page/archive?y='.$y.'&m='.$m)?>