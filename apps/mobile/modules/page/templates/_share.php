<?php $host = sfConfig::get('app_host')?>
<a target="_blank" title="Share on Facebook" 
    onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" 
    class="left" style="background:#1061bb;display:block;height:34px;width:160px;padding:4px 0 0 4px;border-radius:2px;" 
    href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url?>&amp;title=<?php echo $title?>">
    <?php echo image_tag('icons/socials/ico-fb-30.png', array('class'=>'left'))?>
    <h1 class="left" style="color:#fff;width:95px;margin:0 0 0 10px;">ХУВААЛЦАХ</h1>
</a>

<a target="_blank" title="Share on Twitter" 
    onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" 
    class="left" style="background:#3ccaeb;display:block;height:34px;width:150px;padding:4px 0 0 4px;border-radius:2px;margin:0 0 0 8px;" 
    href="https://twitter.com/share?url=<?php echo $url?>&amp;via=<?php echo sfConfig::get('app_webname')?>&amp;text=<?php echo $title?>">
    <?php echo image_tag('icons/socials/ico-tw-30.png', array('class'=>'left'))?>
    <h1 class="left" style="color:#fff;width:95px;margin:0 0 0 10px;">ЖИРГЭХ</h1>
</a>
