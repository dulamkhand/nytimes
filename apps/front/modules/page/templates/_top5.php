<?php $rss = Doctrine::getTable('Content')->doFetchArray(array('title', 'route', 'cover', 'created_at'), 
    						 array('limit'=>5, 'orderBy'=>'nb_views DESC, sort DESC', 'createdAtGt'=>date('Y-m-d H:i', strtotime('-7 week'))));?>
<?php $i = 0?>
<?php foreach ($rss as $rs):?>
    <?php include_partial('page/box_s', array('rs'=>$rs));?>
<?php endforeach;?>
<br clear="all">