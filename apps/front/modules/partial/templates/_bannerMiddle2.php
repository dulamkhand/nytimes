<?php $rs = GlobalTable::doFetchOne('Banner', array('path, mobile_img, ext, link, target'), array('position'=>'middle2'));?>
<?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>600, 'height'=>150));?>
