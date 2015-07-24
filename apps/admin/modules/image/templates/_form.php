<form action="<?php echo url_for('image/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '?contentId='.$content->getId())) ?>" method="POST" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<table width="28%" style="float:left;margin:0 20px 0 0;">
  <tfoot>
    <tr><td colspan="2" style="padding:5px;">&nbsp;</td></tr>
    <tr>
      <td colspan="2">
        <?php echo $form->renderHiddenFields(false) ?>
        <input type="submit" value="Save" />
        &nbsp;<a href="<?php echo url_for('content/index') ?>">Back to content list</a>
      </td>
    </tr>
  </tfoot>
  <tbody>
    <?php echo $form->renderGlobalErrors() ?>
    <tr>
        <td valign="top">
            <div style="margin:10px 0 1px 0;font-weight:bold;">Зураг *:</div>
            <?php echo $form['filename']->renderError() ?>
            <?php echo $form['filename'] ?>
            <?php echo $form['filename']->renderHelp() ?>
          
            <div style="margin:10px 0 1px 0;font-weight:bold;">Тайлбар:</div>
            <?php echo $form['description']->renderError() ?>
            <?php echo $form['description'] ?>
            <?php echo $form['description']->renderHelp() ?>
       
            <br clear="all">
            <label style="display:block;margin:10px 0 1px 0;font-weight:bold;">
                <?php echo $form['iscover']->renderError() ?>
                <?php echo $form['iscover'] ?> Cover зураг эсэх
                <?php echo $form['iscover']->renderHelp() ?>
            </label>
            
            <br clear="all">
            <div style="margin:10px 0 1px 0;font-weight:bold;">Дэс дараалал:</div>
            <?php echo $form['sort']->renderError() ?>
            <?php echo $form['sort'] ?>
            <?php echo $form['sort']->renderHelp() ?>
        </td>
    </tr>
  </tbody>
</table>

<div style="width:600px;float:left;line-height:30px;">
    <a href="<?php echo url_for('content/edit?id='.$content->getId())?>" title="Edit content">[edit content]</a>
    <h1><?php echo $content?></h1>
    <?php echo GlobalLib::clearOutput($content->getIntro())?>
    <br clear="all">
    <?php $images = GlobalTable::doFetchArray('Image', array('id, folder, filename, description'), 
                  array('contentId'=>$content->getId(), 'isActive'=>'all', 'orderBy'=>'sort ASC', 'limit'=>100));?>
    <?php foreach ($images as $image) {?>
        <a href="<?php echo url_for('image/edit?id='.$image['id'])?>" title="Edit image">[edit image]</a> &nbsp; 
        <a onclick="return confirm('Are you sure?')" href="<?php echo url_for('image/delete?id='.$image['id'])?>" title="Delete">[delete image]</a><br>
        <?php echo image_tag('/u/'.$image['folder'].'/t600-'.$image['filename'], array('style'=>'margin:0 0 5px 0'));?><br>
        <?php echo GlobalLib::clearOutput($image['description']);?>
        <br clear="all">
        <hr style="border:0;border-bottom:1px dashed #dedede;margin:7px 0;">
    <?php }?>
    <?php echo GlobalLib::clearOutput($content->getBody())?>
    <br clear="all"
</div>
</form>