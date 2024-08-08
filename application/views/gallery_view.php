<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <style>
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .gallery img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h2>Gallery</h2>
    <div class="gallery">
        <?php if (!empty($files)): ?>
            <?php foreach ($files as $file): ?>
                <div>
                    <img src="<?php echo base_url('uploads/' . $file['file_name']); ?>" alt="<?php echo htmlspecialchars($file['file_name']); ?>">
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No files available in this gallery.</p>
        <?php endif; ?>
    </div>
</body>
</html>
