<?php $host = sfConfig::get('app_host')?>

<form action="<?php echo url_for('comment/show?objectId='.$sf_params->get('objectId'))?>" method="GET">
    <input type="hidden" value="<?php echo $content['id']?>" name="objectId" id="objectId" />
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<a href="<?php echo $host.'/page/show?route='.$content->getRoute()?>" target="_blank">
    <h2><?php echo $content['title'] ?></h2>
</a>
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Comment</th>
      <th>User (IP)</th>
      <th>Date</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $rs): ?>
    <tr <?php if($i%2 != 0) echo 'class="odd"'?> style="<?php if(!$rs->getIsActive()) echo 'background:#cdcdcd;'?>">
        <td><?php echo ++$i?></td>
        <td><?php echo $rs->getText()?></td>
        <td><?php echo $rs->getName().' ('.$rs->getIpAddress().')'?></td>
        <td><?php echo $rs->getCreatedAt()?></td>
        <td nowrap width="20%">
            <?php include_partial('partial/isActive', array('module'=>'comment', 'rs'=>$rs));?>
        </td>
    </tr>
    <?php endforeach; ?>
    <tr><td colspan="10"><?php echo pager($pager, 'comment/show?objectId='.$sf_params->get('objectId').'&keyword='.$sf_params->get('keyword'))?></td></tr>
  </tbody>
</table>