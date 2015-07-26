<div id="leftside">
		<!--top 5 news-->
    <?php include_partial("page/top5", array());?>
    
    <!--banner left top-->    
    <?php $rs = GlobalTable::doFetchOne('Banner', array('path, mobile_img, ext, link, target'), array('position'=>'left-top', 'limit'=>1));?>
    <?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>235, 'height'=>600));?>
		
    <!--category-->
    <?php include_partial("partial/category", array());?>
    
    <!--banner right middle-->
    <?php $rs = GlobalTable::doFetchOne('Banner', array('path, mobile_img, ext, link, target'), array('position'=>'left-middle', 'limit'=>1));?>
    <?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>235, 'height'=>600));?>
</div><!--rightside-->