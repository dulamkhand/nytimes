<?php $rs = GlobalTable::doFetchOne('Banner', array('path, mobile_img, ext, link, target'), array('position'=>'middle1'));?>
<?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>750, 'height'=>150));?>

