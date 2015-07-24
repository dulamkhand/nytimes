<?php $url = url_for('page/show?route='.$rs->getRoute())?>
<div class="left box-s" style="border-top:2px solid #0677cf;">
    <a href="<?php echo $url?>" title="<?php echo GlobalLib::clearOutput($rs->getTitle())?>">
        <h1 style="margin:8px 0 3px 0;border-bottom:1px solid #dedede;padding:0 0 5px 5px;font-weight:bold;letter-spacing:0px;">
        		<?php echo GlobalLib::clearOutput($rs->getTitle())?>
    		</h1>
    </a>
    <?php $cover = str_replace("t600-", "t240-", $rs->getCover())?>
    <?php $dim = getimagesize($host.$cover)?>
    <a href="<?php echo $url?>" title="<?php echo $rs->getTitle()?>">
        <?php echo image_tag($cover, array('style'=>'float:left;max-width:200px;margin:0 10px 0 0;'))?>
    </a>
    <div class="left" style="position:relative;width:500px;height:<?php echo $dim[1]?>px;">
        <?php echo mb_strlen($rs->getIntro()) > 150 ? utf8_substr(GlobalLib::clearOutput($rs->getIntro()), 0, 150).'..' : GlobalLib::clearOutput($rs->getIntro());?>
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
    </div><!--left-->
</div>