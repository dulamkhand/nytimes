<?php $rs = GlobalTable::doFetchOne('Banner', array('path', 'ext', 'link', 'target'), array('position'=>'middle1', 'limit'=>1));?>
<?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>'105%', 'height'=>150));?>

