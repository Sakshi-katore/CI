<!DOCTYPE html>
<html>
<head>
    <title>Add Value</title>
</head>
<body>
    <h1>Add Value</h1>
    <form method="post" action="<?php echo site_url('values/create/' . $key_id); ?>">
        <label for="value">Value:</label>
        <input type="text" id="value" name="value">
        <input type="submit" value="Add">
    </form>
</body>
</html>
