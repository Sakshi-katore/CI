<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Success</title>
</head>
<body>
    <h2>Upload Successful</h2>
    <p>The file has been uploaded successfully.</p>
    <ul>
        <?php foreach ($upload_data as $item => $value): ?>
            <li><?php echo $item; ?>: <?php echo $value; ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="<?php echo site_url('profile'); ?>">Upload Another Profile Picture</a>
</body>
</html>