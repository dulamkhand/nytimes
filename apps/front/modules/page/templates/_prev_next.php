<?php $rs = Doctrine::getTable('Content')->doFetchOne(array('title', 'route', 'cover', 'intro'), array('idLt'=>$id));?>
<?php if($rs):?>
    <a href="<?php echo url_for('page/show?route='.$rs['route'])?>" class="left" style="border-right:1px solid #dedede;padding:0 15px 0 0;">
        <?php $cover = str_replace("t600-", "t240-", $rs['cover'])?>
        <?php echo image_tag($cover, array('style'=>'border-radius:56px;width:120px;height:120px;float:left;'))?>
        <div class="left" style="margin:15px 0 0 20px;">
            <span style="color:#666;">&laquo; Өмнөх сэдэв</span>
            <h3 style="line-height:24px;width:210px;margin:5px 0 0 0;">
                <?php echo GlobalLib::clearOutput($rs['title'])?>
            </h3>
        </div>
    </a>
<?php endif?>

<?php $rs = Doctrine::getTable('Content')->doFetchOne(array('title', 'route', 'cover', 'intro'), array('idGt'=>$id));?>
<?php if($rs):?>
    <a href="<?php echo url_for('page/show?route='.$rs['route'])?>" class="right">
        <?php $cover = str_replace("t600-", "t240-", $rs['cover'])?>
        <?php echo image_tag($cover, array('style'=>'border-radius:56px;width:120px;height:120px;float:right;'))?>
        <div class="right" style="margin:15px 20px 0 0;">
            <span style="color:#666;float:right;">Дараагийн сэдэв &raquo;</span><br>
            <h3 style="line-height:24px;width:210px;text-align:right;margin:5px 0 0 0;">
                <?php echo GlobalLib::clearOutput($rs['title'])?>
            </h3>
        </div>
    </a>
<?php endif?>
<br clear="all">
<br clear="all">