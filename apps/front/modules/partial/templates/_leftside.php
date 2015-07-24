<div id="leftside">
		<!--top 5 news-->
    <?php include_partial("page/top5", array());?>
    
    <!--banner right top-->    
    <?php $rs = GlobalTable::doFetchOne('Banner', array('path, mobile_img, ext, link, target'), array('position'=>'left-top', 'limit'=>1));?>
    <?php if($rs):?>
    		<div style="margin:0 0 10px 0;">
				    <?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>200, 'height'=>400));?>
    		</div>
    <?php endif?>

    <!--banner right middle-->
    <?php $rs = GlobalTable::doFetchOne('Banner', array('path, mobile_img, ext, link, target'), array('position'=>'left-middle', 'limit'=>1));?>
    <?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>200, 'height'=>600));?>
	
</div><!--rightside-->