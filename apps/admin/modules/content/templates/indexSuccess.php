<?php $host = sfConfig::get('app_host')?>
<form action="<?php echo url_for('content/index')?>" method="GET">
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<?php echo pager($pager, 'content/index?s='.$s);?>
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Image</th>
      <th>Title</th>
      <th>Categories</th>
      <th>Nb of views</th>
      <th>Is?</th>
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
          <td><?php echo image_tag($rs->getCover(), array('style'=>'max-width:240px;'))?></td>      
          <td>
              <a href="<?php echo url_for('content/edit?id='.$id)?>" title="Edit" class="action">
                  <?php echo $rs ?>
              </a>
          </td>
          <td><?php echo join(", ", $rs->getCategoryNames());?></td>      
          <td nowrap><?php echo $rs->getNbViews() ?></td>
          <td nowrap>
              <?php if($rs->getIsTop()) echo image_tag('icons/ok.png', array('align'=>'absmiddle')) ?> Top<br>
              <?php if($rs->getIsFeatured()) echo image_tag('icons/ok.png', array('align'=>'absmiddle')) ?> Featured<br>
              <?php if($rs->getIsActive()) echo image_tag('icons/ok.png', array('align'=>'absmiddle')) ?> Active
          </td>
          <?php include_partial('partial/sortDateAdmin', array('rs'=>$rs));?>
          <td nowrap width="20%">
              <a href="<?php echo url_for('image/new?contentId='.$id)?>" class="action">Images</a> &nbsp; | &nbsp;
              <a href="<?php echo url_for('comment/show?objectId='.$id)?>" class="action">Comments (<?php echo $rs->getNbComment() ?>)</a>
              <br clear="all">
              <?php include_partial('partial/isActive', array('module'=>'content', 'rs'=>$rs));?>
              <br clear="all">
              <?php include_partial('partial/isTop', array('module'=>'content', 'rs'=>$rs));?> &nbsp; | &nbsp;
              <?php include_partial('partial/isFeatured', array('module'=>'content', 'rs'=>$rs));?>
              <br clear="all">
              <?php include_partial('partial/editDelete', array('module'=>'content', 'id'=>$rs->getId()));?>
          </td>
        </tr>
    <?php endforeach; ?>
    <tr><td colspan="10"><?php echo pager($pager, 'content/index?s='.$s)?></td></tr>
  </tbody>
</table>
