<h3 class="left" style="margin:0 0 5px 0;width:140px;">Мэдээний архив:</h3>
<?php $years = GlobalLib::getNumbers(2013, date('Y'));?>
<select id="year" name="year" class="left" style="border:1px solid #0677cf;background:#fff;width:70px;" onchange="archiveAjax();">
    <?php foreach ($years as $k):?>
        <option value="<?php echo $k?>" <?php if($y == $k) echo 'selected'?>><?php echo $k?></option>
    <?php endforeach;?>
</select>

<?php $months = GlobalLib::getNumbers(1, 12);?>
<select id="month" name="month" class="left" style="border:1px solid #0677cf;background:#fff;margin:0 0 0 5px;width:70px;" onchange="archiveAjax();">
    <?php foreach ($months as $k):?>
        <option value="<?php echo $k?>" <?php if($m == $k) echo 'selected'?>><?php echo $k?></option>
    <?php endforeach;?>
</select>
<?php echo image_tag('icons/loading-blue.gif', array('id'=>'archive-loader', 'style'=>'display:none;margin:5px 0 0 5px;', 'align'=>'absmiddle'))?>

<br clear="all">
<br clear="all">
<div id="archiveResult">
    <?php include_partial('page/archive', array('pager'=>$pager, 'y'=>$y, 'm'=>$m));?>
</div>

<script type="text/javascript">
function archiveAjax()
{
  $.ajax({
    url: "<?php echo url_for('page/archiveAjax')?>", 
    data: {y : $('#year').val(), m : $('#month').val()},
    beforeSend: function(){
        $('#archive-loader').show();
    },
    success: function(data){
        $('#archive-loader').hide();
        $('#archiveResult').html(data);
    }
  });
}
</script>