<div style="background:#fff;width:720px;padding:15px;border-top:2px solid #ed242d;">
    <h1 style="border-bottom:1px solid #dedede;padding:0 0 10px 0;">Санал болгох сэдвүүд</h1>
    
    <div class="flexsliderRandom">
        <ul class="slides">
            <?php
            $rss = Doctrine::getTable('Content')->doFetchArray(array('title', 'route', 'cover'), 
                          array('idO'=>$id, 'categoryIdNotIn'=>$categoryIds, 'limit'=>10, 'orderBy'=>'RAND()'));?>
            <?php foreach ($rss as $rs):?>
                <li>
                    <a href="<?php echo url_for('page/show?route='.$rs['route'])?>" 
                        style="margin:0 10px 0 0;float:left;width:160px;">
                        <?php $cover = str_replace("t750-", "t240-", $rs['cover'])?>
                        <?php echo image_tag($cover, array('style'=>'width:150px;height:110px;border-radius:4px;'))?>
                        <h3 style="line-height:24px;width:150px;">
                            <?php echo GlobalLib::clearOutput($rs['title'])?>
                        </h3>
                    </a>
                </li>
            <?php endforeach;?>
        </ul>
    </div><!--flexslider-->
</div>
<br clear="all">

<script type="text/javascript">
$(window).load(function() {
  $('.flexsliderRandom').flexslider({
    animation: "slide",
    controlNav: false,
    itemWidth:160,
    itemHeight:120,
  });
});
</script>