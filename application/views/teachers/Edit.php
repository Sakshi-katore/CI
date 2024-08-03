<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Mark</title>
</head>
<body>
<div class="container">
        <h1>Edit Teacher</h1>
        <?php echo validation_errors(); ?>
        <?php echo form_open('teachers/update'); ?>
            <input type="hidden" name="id" value="<?php echo $teacher['id']; ?>">
            
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo set_value('name', $teacher['name']); ?>"><br>

            <label for="subject">Subject:</label>
            <input type="text" name="subject" value="<?php echo set_value('subject', $teacher['subject']); ?>"><br>

            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo set_value('email', $teacher['email']); ?>"><br>

            <input type="submit" value="Update Teacher">
        </form>
    </div>
</body>
</html>
