<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?php include_partial("partial/head", array())?>
<body>
    <?php include_partial("partial/header", array());?>
  
    <div class="wrapper" style="padding:10px 0 0 0;">
        <?php include_partial("partial/bannerHome", array());?>
        <?php include_partial("partial/flash", array());?>
        <?php echo $sf_content ?>
        <br clear="all">
    </div><!--center-->
    
    <?php include_partial("partial/footer", array());?>  
</body>
</html>