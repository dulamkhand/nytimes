<?php $rs = GlobalTable::doFetchOne('Banner', array('path, mobile_img, ext, link, target'), array('position'=>'floating', 'limit'=>1));?>
<?php if($rs):?>
		<div style="position:fixed;left:0px;top:277px;z-index:1000;" id="bannerFloating">
				<?php echo image_tag('icons/close-dark.png', array(
															'style'=>'cursor:pointer;position:absolute;top:-7px;right:-7px;z-index:1001;background:#fff;', 
															'onclick'=>'$("#bannerFloating").hide();', 'alt'=>'Сурталчилгаа хаах', 'title'=>'Сурталчилгаа хаах'))?>
				<?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>200, 'height'=>306));?>
		</div>
<?php endif?>