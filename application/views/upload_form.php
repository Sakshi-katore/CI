<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Images</title>
</head>
<body>
    <h1>School Gallery</h1>
    <form action="<?php echo site_url('schoolgallery/upload_images'); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="userfile[]" multiple>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
