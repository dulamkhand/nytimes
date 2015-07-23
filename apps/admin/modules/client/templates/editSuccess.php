<form action="<?php echo url_for('client/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="submit" value="Save"/>
          &nbsp;<a href="<?php echo url_for('client/index') ?>">Back to list</a>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['logo']->renderLabel() ?></th>
        <td>
          <?php echo $form['logo']->renderError() ?>
          <?php echo $form['logo'] ?>
          <div class="description"><?php echo $form['logo']->renderHelp() ?></div>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['is_active']->renderLabel() ?></th>
        <td>
          <?php echo $form['is_active']->renderError() ?>
          <?php echo $form['is_active'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['sort']->renderLabel() ?></th>
        <td>
          <?php echo $form['sort']->renderError() ?>
          <?php echo $form['sort'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>