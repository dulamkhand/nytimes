<form action="<?php echo url_for('main/search')?>" id="searchForm">
    <input type="text" name="s" id="search" class="search" autocomplete="off" style="width:160px;height:20px;border:2px solid #0677cf;padding:0 5px;background:#fff;"
          value="<?php echo $sf_params->get('s') ? $sf_params->get('s') : 'Хайлт'?>"/>
    <?php echo image_tag('icons/search.ico', array('style'=>'position:absolute;left:155px;top:4px;z-index:1;cursor:pointer;', 'onclick'=>'$("#searchForm").submit();'))?>
</form>

<br clear="all">
<?php $host = sfConfig::get('app_host');?>
<?php if(isset($pager)):?>
		<?php foreach($pager->getResults() as $rs):?>
		    <?php include_partial('page/boxSmall', array('rs'=>$rs, 'host'=>$host));?>
		<?php endforeach;?>
		<?php echo pager($pager, 'main/search?s='.$s)?>
<?php endif?>

<script type="text/javascript">
$('#search').click(function(){
    if($(this).val().trim() == "Хайлт") { $(this).val(''); }
}).blur(function() {
    if($(this).val().trim() == "") { $(this).val('Хайлт'); }
});
</script>