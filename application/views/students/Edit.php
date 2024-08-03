<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <style>
        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            padding: 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            border: none;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Edit Student</h1>
        <?php echo validation_errors(); ?>
        <?php echo form_open('students/update'); ?> <!-- Change to 'teachers/update' if editing teachers -->

        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">

        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo set_value('name', $student['name']); ?>" />

        <label for="mobile">Mobile:</label>
        <input type="text" name="mobile" value="<?php echo set_value('mobile', $student['mobile']); ?>" />

        <label for="address">Address:</label>
        <input type="text" name="address" value="<?php echo set_value('address', $student['address']); ?>" />

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo set_value('email', $student['email']); ?>" />

        <input type="submit" value="Update Student">
        </form>
    </div>
</body>
</html>
