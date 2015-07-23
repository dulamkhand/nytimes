<form action="<?php echo url_for('content/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="POST" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

<table width="100%">
  <tfoot>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr>
      <td colspan="2">
        <?php echo $form->renderHiddenFields(true) ?>
        <input type="submit" value="Save"/>
        <?php if(!$form->getObject()->isNew()):?>
            &nbsp;<a href="<?php echo url_for('image/new?contentId='.$form->getObject()->getId()) ?>">Manage images</a> | 
        <?php endif?>
        &nbsp;<a href="<?php echo url_for('content/index') ?>">Back to list</a>
      </td>
    </tr>
  </tfoot>
  <tbody>
    <?php echo $form->renderGlobalErrors() ?>
    <tr>
      <td>
          <div style="margin:10px 0 1px 0;font-weight:bold;">Ангилал *:</div>
          <?php $params = $sf_params->get('category_ids') ? $sf_params->get('category_ids') : $form->getObject()->getCategoryIds();?>
          <?php $choices = GlobalTable::doFetchSelection('Category', 'name', array('id', 'name'), array('orderBy'=>'sort desc, name asc', 'limit'=>50));?>
          <select name="category_ids[]" style="height:250px;" multiple="1">
              <?php foreach ($choices as $k=>$v):?>
                  <option value="<?php echo $k?>" <?php echo in_array($k, $params) ? 'selected': ''?>><?php echo $v?></option>
              <?php endforeach;?>
          </select><br>
          <span class="help">Ctrl товч + Mouse left click дарж олон ангилал зэрэг сонгоно уу.</span>
          <br clear="all">
          
          <div style="margin:10px 0 1px 0;font-weight:bold;">Гарчиг *:</div>
          <?php echo $form['title']->renderError() ?>
          <?php echo $form['title'] ?>
          <br clear="all">
          
          <div style="margin:10px 0 1px 0;font-weight:bold;">Товч агуулга:</div>
          <?php echo $form['intro']->renderError() ?>
          <?php echo $form['intro'] ?>
          <br clear="all">

          <span class="help" id="helpVideoText" style="text-decoration:underline;cursor:pointer;">
                Youtube видео оруулах заавар
          </span><br>
          <?php echo image_tag('help-video.png', array('id'=>'helpVideoImg', 'style'=>'display:none;max-width:500px;'))?>
          <br clear="all">
          
          <div style="margin:10px 0 1px 0;font-weight:bold;">Төгсгөлын агуулга:</div>
          <?php echo $form['body']->renderError() ?>
          <?php echo $form['body'] ?>
          <br clear="all">
          
          <div style="margin:10px 0 1px 0;font-weight:bold;">Google хайлтын үгс:</div>
          <?php echo $form['keywords']->renderError() ?>
          <?php echo $form['keywords'] ?>
          <br clear="all">
          
          <div style="margin:10px 0 1px 0;font-weight:bold;">Эх сурвалж:</div>
          <?php echo $form['source']->renderError() ?>
          <?php echo $form['source'] ?>
          <?php echo $form['source']->renderHelp() ?>
          <br clear="all">
          
          <?php echo $form['source_link']->renderError() ?>
          <?php echo $form['source_link'] ?>
          <?php echo $form['source_link']->renderHelp() ?>
          <br clear="all">
          
          <div style="margin:10px 0 1px 0;font-weight:bold;">Дэс дараалал:</div>
          <?php echo $form['sort']->renderError() ?>
          <?php echo $form['sort'] ?>
          <?php echo $form['sort']->renderHelp() ?>
          <br clear="all">
          <br clear="all">
          
          <?php echo $form['is_active']->renderError() ?>
          <label class="clean">
              <?php echo $form['is_active'] ?>
              <?php echo $form['is_active']->renderHelp() ?>
          </label>
          <br clear="all">
          
          <?php echo $form['is_top']->renderError() ?>
          <label class="clean">
              <?php echo $form['is_top'] ?>
              <?php echo $form['is_top']->renderHelp() ?>
          </label>
          <br clear="all">
          
          <?php echo $form['is_featured']->renderError() ?>
          <label class="clean">
              <?php echo $form['is_featured'] ?>
              <?php echo $form['is_featured']->renderHelp() ?>
          </label>
          <br clear="all">

          <div style="margin:10px 0 1px 0;font-weight:bold;">Нийтлэгдэх огноо:</div>
          <?php echo $form['post_at']->renderError() ?>
          <?php echo $form['post_at'] ?>
          <?php echo $form['post_at']->renderHelp() ?>
          <br clear="all">
      </td>
    </tr>
  </tbody>
</table>
</form>

<style>
#content_post_at_date{width:100px;}
#content_post_at_hour{width:50px;}
#content_post_at_minute{width:50px;}
</style>

<script type="text/javascript">
$("#helpVideoText").click(function(){
    $("#helpVideoImg").show().fancybox().trigger('click');
});
</script>