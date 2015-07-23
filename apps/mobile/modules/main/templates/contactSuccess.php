<div style="background:#fff;padding:30px 0 30px 70px;margin:8px 0 0 0;border-top:2px solid #0677cf;">
    <?php $form = new FeedbackForm()?>
    <form action="<?php echo url_for('main/contact')?>" method="post" class="left" 
        style="width:380px;margin:0 60px 0 0;border-right:1px solid #dedede;">
    
    		<div style="background:rgba(6,119,207,0.8);padding:5px;width:301px;" class="border-radius-5">
    				<div style="border:1px dashed #fff;color:#fff;text-align:center;line-height:30px;">
    						Та санал хүсэлтээ илгээнэ үү.
    				</div>
    		</div>
      	<?php echo $form->renderGlobalErrors() ?>
    		<br clear="all">
        <?php echo $form['organization']->renderError() ?>
        <?php echo $form['organization'] ?>
        <br clear="all">
        <?php echo $form['name']->renderError() ?>
        <?php echo $form['name'] ?>
        <br clear="all">
        <?php echo $form['email']->renderError() ?>
        <?php echo $form['email'] ?>
        <br clear="all">
        <?php echo $form['phone']->renderError() ?>
        <?php echo $form['phone'] ?>
        <br clear="all">
        <?php echo $form['message']->renderError() ?>
        <?php echo $form['message'] ?>
        <br clear="all">
        
        <span style="padding:1px 0 0;border:1px solid #0677cf;background:#fff;display:block;width:101px;height:33px;">
      	    <input type="submit" value="Илгээх" class="button" style="height:32px;width:100px;padding:4px 25px;"/>
      	</span>
      	<br clear="all">
    </form>
    
    <div class="left" style="width:450px;">
    		<?php include_partial('main/contact', array());?>
    </div>

    <br clear="all">
</div>

<script type="text/javascript">
$(document).ready(function(){
  $('#feedback_org').click(function(){
      if($(this).val().trim() == "Байгууллага") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Байгууллага'); }
  });

  $('#feedback_name').click(function(){
      if($(this).val().trim() == "Таны бүтэн нэр") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Таны бүтэн нэр'); }
  });
  
  $('#feedback_email').click(function(){
      if($(this).val().trim() == "Имэйл хаяг") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Имэйл хаяг'); }
  });

  $('#feedback_phone').click(function(){
      if($(this).val().trim() == "Утасны дугаар") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Утасны дугаар'); }
  });

  $('#feedback_message').click(function(){
      if($(this).val().trim() == "Захидал") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Захидал'); }
  });
  
});
</script>