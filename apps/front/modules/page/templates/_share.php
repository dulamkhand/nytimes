<?php $host = sfConfig::get('app_host')?>

<a target="_blank" title="Share on Facebook" 
    onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" 
    class="left" style="background:#1061bb;display:block;height:32px;width:170px;padding:2px 0 0 2px;border-radius:2px;" 
    href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url?>&amp;title=<?php echo $title?>">
    <?php echo image_tag('icons/socials/ico-fb-30.png', array('class'=>'left'))?>
	<?php //$tmp = file_get_contents('http://graph.facebook.com/?id='.$url);
		//$tmp = explode('"shares":', $tmp);
	?>
    <h1 class="left" style="color:#fff;width:139px;margin:0;text-align:center;">ХУВААЛЦАХ &nbsp;<?php //echo $tmp[1] ? "0" : str_replace("}", "", $tmp[1])?></h1>
</a>

<a target="_blank" title="Share on Twitter" 
    onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" 
    class="left" style="background:#3ccaeb;display:block;height:32px;width:160px;padding:2px 0 0 2px;border-radius:2px;margin:0 0 0 8px;" 
    href="https://twitter.com/share?url=<?php echo $url?>&amp;via=baavar.mn&amp;text=<?php echo $title?>">
    <?php echo image_tag('icons/socials/ico-tw-30.png', array('class'=>'left'))?>
	<?php  //$tmp = file_get_contents('https://cdn.api.twitter.com/1/urls/count.json?url='.$url.'&via=baavar.mn'); 
		//$tmp = explode('"count":', $tmp);
		//$tmp = explode(',', $tmp[1]);
	?>
    <h1 class="left" style="color:#fff;width:129px;margin:0;text-align:center;">ЖИРГЭХ &nbsp;<?php //echo $tmp[0]?></h1>
</a>
&nbsp;