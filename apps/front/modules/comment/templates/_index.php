<div style="background:#fff;width:830px;padding:0px;border-top:2px solid #000;">
    <h1 id="comments-title" style="border-bottom:1px solid #dedede;padding:7px 0 5px 0;">Сэтгэгдэл үлдээх</h1>

    <?php 
    $total = Doctrine::getTable('Comment')->doCount(array('objectType'=>$objectType, 'objectId'=>$objectId));
    $limit = sfConfig::get('app_nb_comment');
    if($total > $limit):?>
        <a href="javascript:showAllComments();" class="buttonLoadmore" id="link-showall" 
                style="text-decoration:underline;">&laquo; Өмнөх сэтгэгдлүүд</a>
    <?php endif?>
    
    <div id="comments">
        <?php $rss = Doctrine::getTable('Comment')->doFetchArray(array('id', 'name', 'text', 'ip_address', 'nb_like', 'nb_unlike', 'created_at'), array(
                    'objectType'=>$objectType,
                    'objectId'=>$objectId, 
                    'offset'=>(intval($total - $limit) > 0 ? intval($total - $limit) : 0), 
                    'limit'=>$limit));?>
        <?php foreach ($rss as $rs):?>
            <?php include_partial('comment/box', array('rs'=>$rs));?>
        <?php endforeach;?>
    </div>
    
    <?php include_partial('comment/form', array('objectType'=>$objectType, 'objectId'=>$objectId)) ?>
</div>

<script type="text/javascript">
function thumbsUp(id) {
  $.ajax({
    url: "<?php echo url_for('comment/thumbsUp')?>", 
    data: {commentId : id},
    success: function(data){
    		if(data != '') {
    				$('#nbLike'+id).html(data);
    		}
    }
  });
}

function thumbsDown(id) {
  $.ajax({
    url: "<?php echo url_for('comment/thumbsDown')?>", 
    data: {commentId : id},
    success: function(data){
    		if(data != '') {
    				$('#nbUnlike'+id).html(data);
    		}
    }
  });
}

function showAllComments()
{
  $.ajax({
    url: "<?php echo url_for('comment/showAll')?>", 
    data: {objectType : "<?php echo $objectType?>", objectId: "<?php echo $objectId?>"},
    success: function(data){
        $('#link-showall').hide();
        $('#comments').html(data);
    }
  });

}
</script>