<div class="left box" style="border-bottom:1px dotted #dedede;">
    <a href="<?php echo url_for('page/show?route='.$rs->getRoute())?>" title="<?php echo GlobalLib::clearOutput($rs->getTitle())?>" style="display:block;">
        <h1 style="margin:0;font-weight:bold;letter-spacing:0px;padding:0 0 5px 0;">
            <?php echo GlobalLib::clearOutput($rs->getTitle())?>
        </h1>
        <div class="left" style="margin:0 0 8px 0;">
        		<span class="left details" style="margin:0">Нэмэгдсэн: <?php echo time_ago($rs->getCreatedAt())?></span>
        		<span class="left details" style="margin:0 0 0 20px">Нээгдсэн:</span>
        		<span class="left details" style="margin:-1px 0 0 2px;font-size:14px;"><?php echo $rs->getNbViews()?></span>
        		<span class="left details" style="margin:0 0 0 20px">Сэтгэгдэл:</span>
        		<span class="left details" style="margin:-1px 0 0 2px;font-size:14px;"><?php echo $rs->getNbComment()?></span>
        </div>
        <?php echo image_tag($rs->getCover(), array('style'=>'max-width:600px;'))?>
    </a>
    <div style="margin:5px 0 0 0;">
        		<?php echo GlobalLib::clearOutput(
                  mb_strlen($rs->getIntro()) > 180
                  ? utf8_substr($rs->getIntro(), 0, 180).' ...' 
                  : $rs->getIntro());?>
    		</div>
        <br clear="all">
    </div>
</div>