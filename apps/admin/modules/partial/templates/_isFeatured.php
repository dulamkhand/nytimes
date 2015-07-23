<?php if($rs->getIsFeatured()==1):?>
    <a href="<?php echo url_for($module.'/featurate?id='.$rs->getId().'&cmd=0') ?>" class="action">Make un FEATURED</a>
<?php else:?>
    <a href="<?php echo url_for($module.'/featurate?id='.$rs->getId().'&cmd=1') ?>" class="action">Make FEATURED</a>
<?php endif;?>