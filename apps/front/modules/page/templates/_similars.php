<h1 style="margin:0;border-top:2px solid #000;border-bottom:1px solid #e2e2e2;padding:5px 0 5px 2px;">Ойролцоо нийтлэлүүд</h1>
<?php $rss = Doctrine::getTable('Content')->doFetchArray(array('title', 'route', 'cover', 'created_at'), 
              array('idO'=>$id, /*'categoryIdIn'=>array_keys($categoryIds),*/ 'limit'=>10, 'orderBy'=>'RAND()'));?>
<?php foreach ($rss as $rs):?>
    <?php include_partial('page/box_s', array('rs'=>$rs, 'width'=>130));?>
    <br clear="all">
<?php endforeach;?>
<br clear="all">