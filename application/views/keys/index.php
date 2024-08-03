<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Keys List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
            font-size: 24px;
            border-bottom: 2px solid #28a745;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        td a {
            display: inline-block;
            padding: 5px 10px;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }
        td a.edit {
            background-color: #007bff;
        }
        td a.edit:hover {
            background-color: #0056b3;
        }
        td a.delete {
            background-color: #dc3545;
        }
        td a.delete:hover {
            background-color: #c82333;
        }
        .add-key-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
            margin-top: 10px;
        }
        .add-key-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h2>Keys</h2>
    
    <a href="<?php echo site_url('keys/create'); ?>" class="add-key-btn">Add Key</a>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Date Key</th>
            <th>Company Name</th>
            <th>Company Address</th>
            <th>Email 1</th>
            <th>Email 2</th>
            <th>Date Time</th>
            <th>Company Number</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($keys as $key): ?>
        <tr>
            <td><?php echo $key['id']; ?></td>
            <td><?php echo $key['date_key']; ?></td>
            <td><?php echo $key['company_name']; ?></td>
            <td><?php echo $key['company_address']; ?></td>
            <td><?php echo $key['email1']; ?></td>
            <td><?php echo $key['email2']; ?></td>
            <td><?php echo $key['dateTime']; ?></td>
            <td><?php echo $key['company_number']; ?></td>
            <td>
                <a href="<?php echo site_url('keys/edit/' . $key['id']); ?>" class="edit">Edit</a>
                <a href="<?php echo site_url('keys/delete/' . $key['id']); ?>" class="delete" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
