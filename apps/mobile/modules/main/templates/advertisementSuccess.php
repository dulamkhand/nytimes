<h3 class="left" style="width:100%;margin:0 0 5px 0;"><?php echo $page?></h3>
<br clear="all">

<?php if($page->getIntro()):?>
    <div style="background:#fff;width:98%;padding:15px;line-height:30px;border-top:2px solid #ff7f27;text-align:center;">
        <?php echo GlobalLib::clearOutput($page->getIntro())?>
    </div>
    <br clear="all">
<?php endif?>

<?php if($page->getImage()) echo image_tag('/u/page/'.$page->getImage(), array('title'=>$page, 'alt'=>$page, 'style'=>'width:100%'))?>
<br clear="all">

<?php if($page->getContent()):?>
<br clear="all">
<div style="background:#fff;width:98%;padding:15px;line-height:30px;border-top:2px solid #ff7f27;">
    <?php echo GlobalLib::clearOutput($page->getContent())?>
</div>
<?php endif?>

<br clear="all">
<div style="background:#fff;width:98%;padding:15px;line-height:30px;border-top:2px solid #0677cf;">
    <?php include_partial('main/contact', array());?>
</div>