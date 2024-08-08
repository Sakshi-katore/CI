<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School Gallery</title>
</head>
<body>
    <h1>School Gallery</h1>

    <?php if (!empty($images)): ?>
        <?php foreach ($images as $image): ?>
            <img src="<?php echo base_url('uploads/' . $image->file_name); ?>" alt="School Image" width="150">
        <?php endforeach; ?>
    <?php else: ?>
        <p>No images found.</p>
    <?php endif; ?>

    <a href="<?php echo site_url('SchoolGallery/index'); ?>">Upload More Images</a>
</body>
</html>


