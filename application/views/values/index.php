<!DOCTYPE html>
<html>
<head>
    <title>Values</title>
</head>
<body>
    <h1>Values for Key <?php echo $key_id; ?></h1>
    <a href="<?php echo site_url('values/create/' . $key_id); ?>">Add Value</a>
    <ul>
        <?php foreach ($values as $value): ?>
            <li>
                <?php echo $value['value']; ?>
                <a href="<?php echo site_url('values/edit/' . $value['id']); ?>">Edit</a>
                <a href="<?php echo site_url('values/delete/' . $value['id']); ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
