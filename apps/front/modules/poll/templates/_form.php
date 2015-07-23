<?php $host = sfConfig::get('app_host')?>

<div style="background:#fff;">
<form action="#" id="pollForm" method="POST">
		<input type="hidden" value="<?php echo $rs['id']?>" name="pollId" id="pollId" />
	  <h1 style="line-height:24px;padding:5px 10px;background:#fff;border-top:2px solid #b66906;border-bottom:1px solid #dedede;">
		Санал асуулга	
    </h1>
		<span style="text-transform:uppercase;padding:0 10px;"><?php echo GlobalLib::clearOutput($rs['title'])?></span>
	  <?php if(isset($rs['body'])):?>
				<div style="padding:10px;color:#666;"><?php echo GlobalLib::clearOutput($rs['body'])?></div>
		<?php endif?>
		
    <!-- OPTIONS -->
    <div id="pollOptions" style="padding:0 10px;">
        <?php $options = GlobalTable::doFetchArray('PollOption', array('id, image, nb_vote, body'), array('pollId'=>$rs['id']));?>
		    <?php foreach ($options as $option):?>
		        <?php $id = $option['id']?>
  		      <label style="cursor:pointer;display:block;width:100%;clear:both;">
  		          <input type="checkbox" id="pollOption<?php echo $id ?>" value="<?php echo $id ?>"
                      onclick="submitPollForm(<?php echo $id ?>);"/>
  		          <?php echo GlobalLib::clearOutput($option['body']) ?>
				  <?php if($option['image']) echo '<br>'.image_tag('/u/poll/'.$option['image'], array('style'=>'width:230px;height:120px;border-radius:100px;')) ?>
  		      </label>
		    <?php endforeach;?>
  			<span class="left" id="pollLoader"></span>
		    <a style="text-decoration:underline;margin:0 5px 10px 0;text-transform:uppercase;cursor:pointer;color:#0677cf;font-weight:bold;"
           onclick="showPollResult();" class="right">Үр дүн</a>
    		<br clear="all">
		</div>
</form>
</div>
<br clear="all">


<script type="text/javascript">
function submitPollForm(id) {
   act = 'inc';
   if($('#pollOption' + id).prop('checked') == false) {
      act = 'dec';   
   }
   $.ajax({
      url: "<?php echo url_for('poll/vote')?>", 
      type: 'POST',
      data: {pollId:$('#pollId').val(), pollOptionId:$('#pollOption' + id).val(), act:act},
      beforeSend: function(data){
          $('#pollLoader').html('<img src="<?php echo $host?>/images/icons/loading-blue.gif" align="absmiddle"/>');
      },
      success: function(data){
          $('#pollOptions').html(data);
          $('#pollLoader').html('');
      }
  });
  return false;
}

function showPollResult() {
   $.ajax({
      url: "<?php echo url_for('poll/result')?>", 
      type: 'GET',
      data: {pollId:$('#pollId').val()},
      beforeSend: function(data){
          $('#pollLoader').html('<img src="<?php echo $host?>/images/icons/loading-blue.gif" align="absmiddle"/>');
      },
      success: function(data){
          $('#pollOptions').html(data);
          $('#pollLoader').html('');         
      }
  });
  return false;
}

</script>