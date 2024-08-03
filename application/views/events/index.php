<!DOCTYPE html>
<html>
<head>
    <title>Event Calendar</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1, h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 10px; text-align: left; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Event Calendar</h1>
    <h2>Events</h2>
    <a href="<?= site_url('events/create'); ?>">Add Event</a>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($events as $event): ?>
        <tr>
            <td><?= $event['title']; ?></td>
            <td><?= $event['description']; ?></td>
            <td><?= $event['start_date']; ?></td>
            <td><?= $event['end_date']; ?></td>
            <td>
                <a href="<?= site_url('events/delete/'.$event['id']); ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
