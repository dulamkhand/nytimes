<div style="color:#ff0033;margin:10px 0;padding:0;">
		Та бусдыг хүндэтгэн зохистой сэтгэгдэл үлдээнэ үү.
</div>
<a name="comment-form"></a>
<form action="#" method="post" class="form" id="comment-form">
      <input type="hidden" value="<?php echo $objectType ?>" name="commentObjectType" id="commentObjectType" />
      <input type="hidden" value="<?php echo $objectId ?>" name="commentObjectId" id="commentObjectId" />
      
      <input type="text" name="comment-name" id="comment-name" value="Таны нэр" style="margin:0 0 2px 0;border:1px solid #ccc;width:600px;" /><br>
      <textarea name="comment-area" id="comment-area" style="margin:0 0 4px 0;border:1px solid #ccc;width:600px;height:80px;">Сэтгэгдэл</textarea>
      <div id="comment-error" style="color:#ED242D;margin:0 0 6px 0;"></div>
    
      <button class="button" type="button" style="border:1px solid #ccc;border-radius:2px;-moz-border-radius:2px;background:#e2e2e2;padding:4px 25px;color:#444;" value="Илгээх" onclick="submitCommentForm();">
          Илгээх
      </button>
      <?php echo image_tag('icons/loading.gif', array('id'=>'comment-loader', 'style'=>'display:none;'))?>
      <br clear="all">
</form>

<script type="text/javascript">
function submitCommentForm()
{
  $('#comment-error').html('');
  
  // validate
  if($('#comment-area').val().trim() == "") {
      $('#comment-error').html('&uarr; Та сэтгэгдлээ оруулна уу &uarr;');
      return false;
  }
  
  $.ajax({
    url: "<?php echo url_for('comment/save')?>", 
    type: "POST",
    data: {commentObjectId:$('#commentObjectId').val(), commentObjectType:$('#commentObjectType').val(), commentName:$('#comment-name').val(), commentBody:$('#comment-area').val()},
    beforeSend: function(){
      $('#comment-loader').show();
    },
    success: function(data)        
    {
      $('#comment-loader').hide();
      $("#comments").append(data);

      $('#comment-area').val("");
    }
  });
  return false;
}


$(document).ready(function(){
  
  /* name */
  $('#comment-name').click(function(){
      if($(this).val().trim() == "Таны нэр")
      {
          $(this).val('');
      }
  }).blur(function() {
      if($(this).val().trim() == "")
      {
          $(this).val('Таны нэр');
      }
  });
  
  
  /* textarea */
  $('#comment-area').blur(function(){
      if($(this).val().trim() == "Сэтгэгдэл")
      {
          $(this).val('');
      }
  });
  
  
  /* avator choose */
  $('#comment-img').mouseover(function(){
      $('#comment-imgs').show();
  });
  
  $('#comment-img').mouseleave(function(){
      $('#comment-imgs').hide();
  });
  
  $('.comment-avator').mouseover(function(){
      $(this).css('border','1px solid green');
  });
  
  $('.comment-avator').mouseleave(function(){
      $(this).css('border','1px solid #fff');
  });

  $('.comment-avator').click(function(){
      src = $(this).attr('src');
      $('#chosen-comment-avator').attr('src',src);
  });
  

});
</script>