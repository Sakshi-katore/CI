<!DOCTYPE html>
<html>
<head>
    <title>Company Settings</title>
    <style>/* assets/css/style.css */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

h1 {
    text-align: center;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px auto;
    background: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f4f4f4;
}

tr:hover {
    background-color: #f1f1f1;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin: 10px 0 5px;
}

input[type="text"], textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Add this CSS for the "Add Setting" button */
.add-setting-button {
    display: inline-block;
    background-color: #28a745; /* Green background */
    color: white; /* White text */
    padding: 10px 20px; /* Padding for the button */
    border-radius: 4px; /* Rounded corners */
    text-decoration: none; /* Remove underline */
    font-weight: bold; /* Bold text */
}

.add-setting-button:hover {
    background-color: #218838; /* Darker green on hover */
}
    </style>
</head>
<body>
    <h1>Company Settings</h1>
    <a href="<?php echo site_url('company/create'); ?>" class="add-setting-button">Add Setting</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Key</th>
            <th>Value</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($settings as $setting): ?>
        <tr>
            <td><?php echo $setting['id']; ?></td>
            <td><?php echo $setting['key']; ?></td>
            <td><?php echo $setting['value']; ?></td>
            <td>
                <a href="<?php echo site_url('company/edit/'.$setting['id']); ?>">Edit |</a>
                <a href="<?php echo site_url('company/delete/'.$setting['id']); ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
