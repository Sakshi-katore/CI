<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Teacher Images</title>
</head>
<body>
    <h1>Upload Teacher Images</h1>
    <form action="<?php echo site_url('teachergallery/upload_images'); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="userfile[]">
        <button type="submit">Upload</button>
    </form>
</body>
</html>
