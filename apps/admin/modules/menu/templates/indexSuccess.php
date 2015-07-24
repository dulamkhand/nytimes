
<form action="<?php echo url_for('menu/index')?>" method="GET">
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Sort</th>
      <th>Date</th>
      <th>Admin</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $rs): ?>
        <?php $id = $rs->getId()?>
        <tr <?php if($i%2 != 0) echo 'class="odd"'?> style="<?php if(!$rs->getIsActive()) echo 'background:#cdcdcd;'?>">
          <td><?php echo ++$i?></td>
          <td>
              <a href="<?php echo url_for('menu/edit?id='.$id)?>" title="Edit" class="action">
                  <?php echo $rs ?>
              </a>
          </td>
          <?php include_partial('partial/sortDateAdmin', array('rs'=>$rs));?>
          <td nowrap width="20%">
              <?php include_partial('partial/isActive', array('module'=>'menu', 'rs'=>$rs));?>
              <br clear="all">
              <?php include_partial('partial/editDelete', array('module'=>'menu', 'id'=>$rs->getId()));?>
          </td>
        </tr>
    <?php endforeach; ?>
    <tr><td colspan="10"><?php echo pager($pager, 'menu/index?s='.$sf_params->get('s'))?></td></tr>
  </tbody>
</table>
