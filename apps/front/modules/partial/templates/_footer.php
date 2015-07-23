<div class="wrapper">
		<!--banner footer-->    
		<?php $rs = GlobalTable::doFetchOne('Banner', array('path', 'ext', 'link', 'target'), array('position'=>'footer', 'limit'=>1));?>
		<?php if($rs):?>
				<?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>1000, 'height'=>150));?>
		<?php endif?>
		<div style="text-transform:uppercase;font-size:14px;text-align:center;margin:0 0 5px 0;">
				Та сайтад тавигдсан мэдээллийг ашигласан тохиолдолд сайтын нэрийг заавал дурдана уу. www.baavar.mn
		</div>
</div>

<?php include_partial("partial/clients", array());?>

<div id="footer">
    <div class="left" style="margin:0 10px 0 0;">
		<!--<a><img src="http://hitwebcounter.com/counter/counter.php?page=5945219&style=0038&nbdigits=5&type=page&initCount=50000" title="" alt="" border="0"></a>-->
		<?php //echo hits_webcounter(0);?>
	</div>
    <div class="right" style="margin:0 10px 0 0;">
        <ul>
            <li class="left"><a href="<?php echo url_for('main/about')?>">Вэбийн тухай</a> &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
            <li class="left"><a href="<?php echo url_for('main/advertisement')?>">Реклам байршуулах</a> &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
            <li class="left"><a href="<?php echo url_for('main/contact')?>">Холбогдох</a></li>
        </ul>
    </div>
    <br clear="all">
</div>