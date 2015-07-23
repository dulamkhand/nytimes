<?php $host = sfConfig::get('app_host')?>

<form action="<?php echo url_for('comment/index')?>" method="GET">
    <input type="hidden" value="<?php echo $content['id']?>" name="objectId" id="objectId" />
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Comment</th>
      <th>User (IP)</th>
      <th>Date</th>
      <th>Content</th>
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
        <td>
            <?php if($content = GlobalTable::doFetchOne('Content', array('route', 'title'), array('id'=>$rs->getObjectId()))):?>
                <a href="<?php echo url_for('comment/show?objectId='.$content->getId())?>" class="action">
                    <?php echo $content['title'] ?>
                </a>
            <?php else:?>
                content removed or not found
            <?php endif?>
        </td>
        <td nowrap width="20%">
            <?php include_partial('partial/isActive', array('module'=>'comment', 'rs'=>$rs));?>
        </td>
    </tr>
    <?php endforeach; ?>
    <tr><td colspan="10"><?php echo pager($pager, 'comment/index?objectId='.$sf_params->get('objectId').'&keyword='.$sf_params->get('keyword'))?></td></tr>
  </tbody>
</table>