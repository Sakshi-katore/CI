<!DOCTYPE html>
<html>
<head>
    <title>Edit Setting</title>
</head>
<body>
    <h1>Edit Setting</h1>
    <?php echo validation_errors(); ?>
    <form method="post" action="<?php echo site_url('company/update'); ?>">
        <input type="hidden" name="id" value="<?php echo $setting['id']; ?>">
        <label for="key">Key:</label>
        <input type="text" name="key" value="<?php echo set_value('key', $setting['key']); ?>">
        <br>
        <label for="value">Value:</label>
        <textarea name="value"><?php echo set_value('value', $setting['value']); ?></textarea>
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
