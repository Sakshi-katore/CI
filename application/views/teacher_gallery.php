<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Gallery</title>
</head>
<body>
    <h1>Teacher Gallery</h1>

    <?php if (!empty($images)): ?>
        <?php foreach ($images as $image): ?>
            <img src="<?php echo base_url($image->upload_path); ?>" alt="Teacher Image" width="150">
        <?php endforeach; ?>
    <?php else: ?>
        <p>No images found.</p>
    <?php endif; ?>

    <a href="<?php echo site_url('TeacherGallery/index'); ?>">Upload More Images</a>
</body>
</html>
