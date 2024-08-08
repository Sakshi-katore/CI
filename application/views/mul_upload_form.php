<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        .gallery-item {
            position: relative;
        }
        .gallery-item .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: red;
            color: white;
            border: none;
            padding: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Gallery</h2>
    <div class="gallery">
        <?php if (!empty($files)): ?>
            <?php foreach ($files as $file): ?>
                <div class="gallery-item">
                    <img src="<?php echo base_url('uploads/' . $file['file_name']); ?>" alt="<?php echo htmlspecialchars($file['file_name']); ?>">
                    
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No files available in this gallery.</p>
        <?php endif; ?>
    </div>
    <a href="<?php echo site_url('mul_upload/multiple_upload'); ?>">Back to Upload</a>
    
   
</body>
</html>