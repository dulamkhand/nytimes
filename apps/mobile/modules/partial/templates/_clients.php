<div style="background:#fff;width:99.2%;padding:1px 5px 10px 5px;border-top:2px solid #ed242d;">
    <h1 style="border-bottom:1px solid #dedede;padding:0 0 1px 0;margin:0;">Харилцагч байгууллагууд</h1>
    <div class="flexsliderClients">
        <ul class="slides">
            <?php
            $rss = GlobalTable::doFetchArray('Client', array('logo'), array('orderBy'=>'RAND()'));?>
            <?php foreach ($rss as $rs):?>
                <li><?php echo image_tag('/u/client/'.$rs['logo'], array('style'=>'max-width:200px;max-height:60px;'))?></li>
            <?php endforeach;?>
        </ul>
    </div><!--flexslider-->
</div>
<br clear="all">

<script type="text/javascript">
$(window).load(function() {
  $('.flexsliderClients').flexslider({
    animation: "slide",
    controlNav: false,
    directionNav: false,
    itemWidth:200,
    itemHeight:50,
  });
});
</script>