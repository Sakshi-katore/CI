<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload or Fetch Student Images</title>
</head>
<body>
    <h1>Upload or Fetch Student Images</h1>
    <form action="<?php echo site_url('studentgallery/upload_images'); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="userfile[]">
        <button type="submit">Upload</button>
    </form>

    <form action="<?php echo site_url('studentgallery/fetch_student'); ?>" method="post">
        <label for="student_id">Enter Student ID:</label>
        <input type="text" name="student_id" id="student_id" required>
        <button type="submit">Fetch Student</button>
    </form>
</body>
</html>
