<?php $rs = GlobalTable::doFetchOne('Banner', array('path, mobile_img, ext, link, target'), array('position'=>'home-top', 'limit'=>1));?>
<?php if($rs):?>
	<div style="margin:0 0 5px">
		<?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>600, 'height'=>150));?>
	</div>
<?php endif?>