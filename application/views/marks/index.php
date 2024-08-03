<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marks</title>
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
                window.location.href = "<?php echo site_url('marks/delete/'); ?>" + id;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="add-button">
            <a href="<?php echo site_url('marks/create'); ?>" class="btn btn-add">Add Mark</a>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Record ID</th>
                <th>Subject</th>
                <th>Marks</th>
                <th>Actions</th>
            </tr>
            <?php if (!empty($marks)) : ?>
                <?php foreach ($marks as $mark) : ?>
                    <tr>
                        <td><?php echo $mark['id']; ?></td>
                        <td><?php echo $mark['record_id']; ?></td>
                        <td><?php echo $mark['subject']; ?></td>
                        <td><?php echo $mark['marks']; ?></td>
                        <td>
                            <a href="<?php echo site_url('marks/edit/'.$mark['id']); ?>" class="btn btn-edit">Edit</a>
                            <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $mark['id']; ?>);" class="btn btn-delete">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5">No records found.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
