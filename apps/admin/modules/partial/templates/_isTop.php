<?php if($rs->getIsTop()==1):?>
    <a href="<?php echo url_for($module.'/top?id='.$rs->getId().'&cmd=0') ?>" class="action">Make TOP</a>
<?php else:?>
    <a href="<?php echo url_for($module.'/top?id='.$rs->getId().'&cmd=1') ?>" class="action">Make not TOP</a>
<?php endif;?>