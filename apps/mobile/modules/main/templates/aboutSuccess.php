<h3 class="left" style="width:100%;margin:0 0 5px 0;"><?php echo $page?></h3>
<br clear="all">

<div style="background:#fff;width:98%;padding:15px;line-height:30px;border-top:2px solid #0677cf;">
<?php echo GlobalLib::clearOutput($page->getIntro())?>
<br clear="all">
<br clear="all">
<hr style="border:0;border-top:1px dashed #ccc;">
<br clear="all">
<?php echo GlobalLib::clearOutput($page->getContent())?>
</div>

<?php 
if($page->getImage()) {
    echo image_tag('/u/page/'.$page->getImage(), array('title'=>$page, 'alt'=>$page, 'style'=>'width:100%'));
    echo '<br clear="all">';
}
?>

<br clear="all">
<div style="background:#fff;width:98%;padding:15px;line-height:30px;border-top:2px solid #0677cf;">
    <?php include_partial('main/contact', array());?>
</div>