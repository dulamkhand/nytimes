<?php $host = sfConfig::get('app_host')?>
<form action="<?php echo url_for('poll/index')?>" method="GET">
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th>#</th>
      <th>Poll</th>
      <th width="20%">Options</th>
      <th>Is?</th>
      <th>Sort</th>
      <th>Date</th>
      <th>Admin</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0;?>
    <?php foreach ($pager->getResults() as $rs): ?>
    <tr <?php if($i%2 != 0) echo 'class="odd"'?> style="<?php if(!$rs->getIsActive()) echo 'background:#cdcdcd;'?>">
        <td><?php echo ++$i?></td>
        <td>
            <a href="<?php echo url_for('poll/edit?id='.$rs->getId())?>" class="action" title="EDIT">
                <?php echo $rs->getTitle() ?>
            </a><br>
            <?php echo $rs->getBody() ?>
        </td>
        <td nowrap>
            <?php $options = GlobalTable::doFetchArray('PollOption', array('id, nb_vote, image, body'), array('pollId'=>$rs->getId()));?>
			<?php $total = 0;?>
			<?php foreach ($options as $option) {$total += $option['nb_vote'];}?>
			<?php $arr = array();?>			
			<?php foreach ($options as $option):?>
				<div>
					<?php echo $option['body']?>
					(<span style="color:#0677cf;"><?php echo $option['nb_vote']?> санал, <?php echo number_format($option['nb_vote']*100/$total)?>%</span>)
					&nbsp;&nbsp;[<a href="<?php echo url_for('pollOption/edit?id='.$option['id'])?>" title="Edit" class="action">Edit</a> | 
						  <a onclick="return confirm('Are you sure?')" href="<?php echo url_for('pollOption/delete?id='.$option['id'])?>" title="Delete" class="action">Delete</a>]
					<br>
					<?php if($option['image']):?>
						<img src="<?php echo $host?>u/poll/<?php echo $option['image']?>" style="max-width:240px;max-height:400px;">
					<?php endif?>
				</div>
			<?php endforeach;?>
        </td>
        <td nowrap>
            <?php if($rs->getIsActive()) echo image_tag('icons/ok.png', array('align'=>'absmiddle')) ?> Active<br>
            <?php if($rs->getIsFeatured()) echo image_tag('icons/ok.png', array('align'=>'absmiddle')) ?> Featured<br>
        </td>
        <?php include_partial('partial/sortDateAdmin', array('rs'=>$rs));?>
        <td nowrap>
            <a href="<?php echo url_for('pollOption/new?pollId='.$rs->getId())?>" class="action">Add option</a>
            <br clear="all">
            <?php include_partial('partial/isFeatured', array('module'=>'poll', 'rs'=>$rs));?> &nbsp; | &nbsp;
            <?php include_partial('partial/isActive', array('module'=>'poll', 'rs'=>$rs));?>
            <br clear="all">
            <?php include_partial('partial/editDelete', array('module'=>'poll', 'id'=>$rs->getId()));?>
        </td> 
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'poll/index?s='.$sf_params->get('s'))?>