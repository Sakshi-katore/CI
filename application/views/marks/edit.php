<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Mark</title>
</head>
<body>
    <h2>Edit Mark</h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open('marks/edit/'.$mark['id']); ?>
        <label for="record_id">Record ID</label>
        <input type="text" name="record_id" value="<?php echo $mark['record_id']; ?>"><br>

        <label for="subject">Subject</label>
        <input type="text" name="subject" value="<?php echo $mark['subject']; ?>"><br>

        <label for="marks">Marks</label>
        <input type="text" name="marks" value="<?php echo $mark['marks']; ?>"><br>

        <input type="submit" name="submit" value="Update Mark">
    </form>
</body>
</html>
