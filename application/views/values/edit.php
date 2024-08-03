<!DOCTYPE html>
<html>
<head>
    <title>Edit Value</title>
</head>
<body>
    <h1>Edit Value</h1>
    <form method="post" action="<?php echo site_url('values/edit/' . $value['id']); ?>">
        <label for="value">Value:</label>
        <input type="text" id="value" name="value" value="<?php echo $value['value']; ?>">
        <input type="hidden" name="key_id" value="<?php echo $value['key_id']; ?>">
        <input type="submit" value="Save">
    </form>
</body>
</html>
