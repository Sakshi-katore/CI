<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Teacher</title>
</head>
<body>
    <h1>Add Teacher</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('teachers/create'); ?>
    
    
    
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo set_value('name'); ?>" /><br />
    
    <label for="subject">Subject:</label>
    <input type="text" name="subject" value="<?php echo set_value('subject'); ?>" /><br />
    
    <label for="email">Email:</label>
    <input type="text" name="email" value="<?php echo set_value('email'); ?>" /><br />
    
    <input type="submit" name="submit" value="Add Teacher" />
    
    </form>
</body>
</html>
