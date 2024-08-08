
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Gallery</title>
</head>
<body>
    <h1>Student Image</h1>

    <?php if (!empty($image)): ?>
        <img src="<?php echo base_url($image->upload_path); ?>" alt="Student Image" width="150">
        <p>Uploaded on: <?php echo $image->uploaded_on; ?></p>
    <?php else: ?>
        <p>No image found.</p>
    <?php endif; ?>

    <a href="<?php echo site_url('StudentGallery/index'); ?>">Upload More Images</a>
</body>
</html>
