<?php $host = sfConfig::get('app_host')?>
<?php //$cover = str_replace("t750-", "t240-", $rs->getCover())?>
<?php $cover = $rs->getCover()?>
<?php $dim = getimagesize($host.$cover)?>
<?php $height = intval(mb_strlen($rs->getTitle())*3/2) + $dim[1] + ($rs->getIntro() ? 100 : 10)?>
<a href="<?php echo url_for('page/show?route='.$rs->getRoute())?>" title="<?php echo GlobalLib::clearOutput($rs->getTitle())?>" 
		style="display:block;background:#f78f07;margin:0 0 10px 0;background:url('<?php echo $host.$cover?>') 20% 10% no-repeat;background-size:470px 390px;width:240px;height:390px;">
		<!--<h1 style="margin:0;padding:2px 10px;background:#343434;color:#fff;">Онцлох мэдээ</h1>-->
		<?php //echo image_tag($cover, array('style'=>'width:240px;height:400px;'))?>
		<div style="position:absolute;bottom:0;left:0;padding:5px;background:rgba(0,0,0,0.6);color:#fff;">
			<h1 style="color:#fff;line-height:22px;margin:0 0 5px 0;">
        		<?php echo GlobalLib::clearOutput($rs->getTitle())?>
    		</h1>
    		<?php echo GlobalLib::clearOutput(
                  mb_strlen($rs->getIntro()) > 95 
                  ? utf8_substr($rs->getIntro(), 0, 95).' ..'  
                  : $rs->getIntro());?>
		</div>
</a>