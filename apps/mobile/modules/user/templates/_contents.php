<ul id="loadmore">

</ul>

<a style="margin:5px 0;width:100%;" name="loadmore" href='javascript:loadmore("<?php echo url_for('user/loadmore?authorId='.$authorId)?>#loadmore", "#loadmore");' class="buttonLoadmore" id="link-showall">Цааш унших &darr; </a>


<script type="text/javascript">
function loadmore(url, success)
{
  $.ajax({
    url: url, 
    success: function(data){
        $(success).append(data);
    }
  });
}

loadmore("<?php echo url_for('user/loadmore?authorId='.$authorId)?>", "#loadmore");
</script>