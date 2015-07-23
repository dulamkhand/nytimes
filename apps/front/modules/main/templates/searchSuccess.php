<h3 class="left" style="margin:0 0 5px 0;width:100%;">Хайлтын үр дүн: "<?php echo $s?>"</h3>
<br clear="all">
<?php $host = sfConfig::get('app_host');?>
<?php foreach($pager->getResults() as $rs):?>
    <?php include_partial('page/boxSmall', array('rs'=>$rs, 'host'=>$host));?>
<?php endforeach;?>

<?php echo pager($pager, 'main/search?s='.$s)?>