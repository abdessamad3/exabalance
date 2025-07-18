<?php include('header.php');?>
<h2>Error</h2>
<p><?php echo isset($error) ? $error : '';?></p>
<br>
<p><a href=".">back to list</a></p>
<?php include('footer.php')?>