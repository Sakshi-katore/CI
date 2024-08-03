<!DOCTYPE html>
<html>
<head>
    <title>Add Event</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1, h2 { color: #333; }
        form { margin-top: 20px; }
        label { display: block; margin-top: 10px; }
        input[type="text"], textarea, input[type="date"] { width: 100%; padding: 8px; margin-top: 5px; }
        input[type="submit"] { padding: 10px 20px; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Add Event</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('events/create'); ?>   <!--handle form submission-->
        <label for="title">Title</label>
        <input type="text" name="title" /><br />

        <label for="description">Description</label>
        <textarea name="description"></textarea><br />

        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" /><br />

        <label for="end_date">End Date</label>
        <input type="date" name="end_date" /><br />

        <input type="submit" name="submit" value="Add Event" />
    </form>
</body>
</html>
