<?php $url = url_for('page/show?route='.$rs->getRoute())?>
<div class="left box" style="border-top:2px solid #0677cf;">
    <a href="<?php echo $url?>" title="<?php echo GlobalLib::clearOutput($rs->getTitle())?>">
        <h1 style="margin:8px 0 3px 0;border-bottom:1px solid #dedede;padding:0 0 5px 5px;">
        		<?php echo GlobalLib::clearOutput($rs->getTitle())?>
    		</h1>
    </a>
    <?php $cover = str_replace("t750-", "t240-", $rs->getCover())?>
    <?php $dim = getimagesize($host.$cover)?>
    <a href="<?php echo $url?>" title="<?php echo $rs->getTitle()?>">
        <?php echo image_tag($cover, array('style'=>'float:left;width:120px;max-height:105px;margin:0 5px 0 0;'))?>
    </a>
    <div class="left" style="position:relative;width:60%;height:130px;">
        <?php echo GlobalLib::clearOutput(
                  mb_strlen($rs->getIntro()) > 130 
                  ? utf8_substr($rs->getIntro(), 0, 130).'..' 
                  : $rs->getIntro());?>
    </div>
    <br clear="all">
    <div style="position:absolute;bottom:0;left:0;height:12px;padding:6px 0;width:100%;">
          <span class="left c-fff timeago" style="margin:0 8px 0 0;color:#0677cf!important;">
              <?php echo time_ago($rs->getCreatedAt())?>
          </span>
          <a href="<?php echo $url?>" class="left c-fff" style="line-height:13px;margin:0 8px;color:#0677cf!important">
              <?php echo image_tag('icons/eye.ico', array('class'=>'left', 'style'=>'margin:-3px 4px 0 0;max-width:20px;'))?> <?php echo $rs->getNbViews()?>
          </a>
          <a href="<?php echo $url?>#comments-title" class="left c-fff" style="line-height:13px;margin:0 8px;color:#0677cf!important;">
              <?php echo image_tag('icons/comments.ico', array('align'=>'absmiddle'))?> <?php echo $rs->getNbComment()?>
          </a>
          <a href="<?php echo $url?>" class="right c-fff more" style="color:#0677cf!important;">
              Дэлгэрэнгүй &raquo; &nbsp;
          </a>
          <br clear="all">
      </div>   
</div>