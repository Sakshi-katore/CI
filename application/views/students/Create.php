<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
</head>
<body>
    <h1>Add Student</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('students/create'); ?>
    
    
    
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo set_value('name'); ?>" /><br />
    
    <label for="mobile">Mobile</label>
    <input type="text" name="mobile" value="<?php echo set_value('mobile'); ?>" /><br />

    <label for="address">Address</label>
    <input type="text" name="address" value="<?php echo set_value('address'); ?>" /><br />
    
    <label for="email">Email:</label>
    <input type="text" name="email" value="<?php echo set_value('email'); ?>" /><br />
    
    <input type="submit" name="submit" value="Add Student" />
    
    </form>
</body>
</html>
