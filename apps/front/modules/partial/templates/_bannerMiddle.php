<?php if($i == 2):?>
    <div style="margin:0 0 10px <?php echo isset($showPage) ? '-15px' : '0'?>">
        <?php include_partial("partial/bannerMiddle1");?>
    </div>
<?php elseif($i == 5):?>
    <div style="margin:0 0 10px <?php echo isset($showPage) ? '-15px' : '0'?>">
        <?php include_partial("partial/bannerMiddle2");?>
    </div>
<?php elseif($i == 7):?>
    <div style="margin:0 0 10px <?php echo isset($showPage) ? '-15px' : '0'?>">
        <?php include_partial("partial/bannerMiddle3");?>
    </div>
<?php endif?>