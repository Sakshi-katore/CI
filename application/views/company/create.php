<!DOCTYPE html>
<html>
<head>
    <title>Add Setting</title>
</head>
<body>
    <h1>Add Setting</h1>
    <?php echo validation_errors(); ?>
    <form method="post" action="<?php echo site_url('company/store'); ?>">
        <label for="key">Key:</label>
        <input type="text" name="key" value="<?php echo set_value('key'); ?>">
        <br>
        <label for="value">Value:</label>
        <textarea name="value"><?php echo set_value('value'); ?></textarea>
        <br>
        <input type="submit" value="Add">
    </form>
</body>
</html>
