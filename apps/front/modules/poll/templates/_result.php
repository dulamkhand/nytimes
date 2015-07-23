<?php $options = GlobalTable::doFetchArray('PollOption', array('id, nb_vote, image, body'), array('pollId'=>$pollId));?>
<?php $total = 0;
foreach ($options as $option) {
		$total += $option['nb_vote'];
}?>
<?php foreach ($options as $option):?>
    <?php $id = $option['id']?>
    <?php echo GlobalLib::clearOutput($option['body']) ?><br>
    <span style="color:#0677cf;">
			<?php echo $option['nb_vote'] ?> санал, <?php echo number_format($option['nb_vote']*100/$total); ?>%
			<?php if($option['image']) echo '<br>'.image_tag('/u/poll/'.$option['image'], array('style'=>'width:230px;height:120px;border-radius:100px;')) ?>
		</span>
    <br clear="all">
<?php endforeach;?>
<br clear="all">