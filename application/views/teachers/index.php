<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teachers</title>
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
                window.location.href = "<?php echo site_url('teachers/delete/'); ?>" + id;
            }
        }
    </script>
</head>
<body>
<div class="container">
        <div class="add-button">
            <a href="<?php echo site_url('teachers/create'); ?>" class="btn btn-add">Add Teacher</a>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php foreach ($teachers as $teacher): ?>
            <tr>
                <td><?php echo $teacher['id']; ?></td>
                <td><?php echo $teacher['name']; ?></td>
                <td><?php echo $teacher['subject']; ?></td>
                <td><?php echo $teacher['email']; ?></td>
                <td>
                    <a href="<?php echo site_url('teachers/edit/'.$teacher['id']); ?>" class="btn btn-edit">Edit</a>
                    <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $teacher['id']; ?>);" class="btn btn-delete">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
