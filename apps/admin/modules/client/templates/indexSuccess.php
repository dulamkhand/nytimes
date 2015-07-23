<?php $host = sfConfig::get('app_host')?>
<form action="<?php echo url_for('client/index')?>" method="GET">
    <?php include_partial('partial/search', array());?>
</form>
<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Client</th>
      <th>Sort</th>
      <th>Date</th>
      <th>Admin</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $rs): ?>
    <tr <?php if($i%2 != 0) echo 'class="odd"'?> style="<?php if(!$rs->getIsActive()) echo 'background:#cdcdcd;'?>">
      <td><?php echo ++$i?></td>
      <td>
        <?php echo image_tag('/u/client/'.$rs->getLogo(), array('style'=>'max-width:300px;max-height:150px;'));?>
      </td>
      <?php include_partial('partial/sortDateAdmin', array('rs'=>$rs));?>
      <td nowrap width="20%">
          <?php include_partial('partial/isActive', array('module'=>'client', 'rs'=>$rs));?>
          <br clear="all">
          <?php include_partial('partial/editDelete', array('module'=>'client', 'id'=>$rs->getId()));?>
      </td>
    </tr>
    <?php endforeach; ?>
    <tr><td colspan="10"><?php echo pager($pager, 'client/index?position='.$sf_params->get('position'))?></td></tr>
  </tbody>
</table>
