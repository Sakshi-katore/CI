<!DOCTYPE html>
<html>
<head>
    <title>Upload Form</title>
</head>
<body>

<?php if (isset($error) && $error != ''): ?>
    <p><?php echo $error; ?></p>
<?php endif; ?>

<!---->
<form method="POST" action="<?=base_url('uploadcontroller/do_upload');?>" enctype="multipart/form-data"> 
<input type="text" name="name" />
<input type="file" name="userfile" />

<br /><br />

<input type="submit" value="Upload" />

</form>

</body>
</html>
