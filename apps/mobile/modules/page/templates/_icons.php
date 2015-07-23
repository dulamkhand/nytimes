<span class="left c-888" style="margin:0 0 5px 0;"><?php echo time_ago($rs->getCreatedAt())?></span>
<span class="left c-888" style="margin:0 0 5px 10px;"><?php echo image_tag('icons/eye.ico', array('class'=>'left', 'style'=>'margin:1px 4px 0 0;max-width:20px;'))?> <?php echo $rs->getNbViews()?></span>
<a href="#comments-title" class="left c-888" style="margin:0 0 5px 10px;">
    <?php echo image_tag('icons/comments.ico', array('align'=>'absmiddle'))?> <?php echo $rs->getNbComment()?>
</a>