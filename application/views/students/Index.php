<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students</title>
    <style>
        .container {
            width: 80%;
            margin: 120px auto;
            position: relative;
        }
        .add-button {
            text-align: right;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
            color: white;
            border-radius: 3px;
            font-weight: bold;
        }
        .btn-edit {
            background-color: green;
        }
        .btn-delete {
            background-color: red;
        }
        .btn-add {
            background-color: blue;
        }
    </style>
    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location.href = "<?php echo site_url('students/delete/'); ?>" + id;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="add-button">
            <a href="<?php echo site_url('students/create'); ?>" class="btn btn-add">Add Student</a>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php if (!empty($marks)) : ?>
                <?php foreach ($marks as $mark) : ?>
                    <tr>
                        <td><?php echo $mark['id']; ?></td>
                        <td><?php echo $mark['name']; ?></td>
                        <td><?php echo $mark['mobile']; ?></td>
                        <td><?php echo $mark['address']; ?></td>
                        <td><?php echo $mark['email']; ?></td>
                        <td>
                            <a href="<?php echo site_url('students/edit/'.$mark['id']); ?>" class="btn btn-edit">Edit</a>
                            <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $mark['id']; ?>);" class="btn btn-delete">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">No records found.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
