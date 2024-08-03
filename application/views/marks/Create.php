<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Marks</title>
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
        .form-container {
            padding: 0 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }
        button {
            background-color: #28a745;
            color: #fff;
            padding: 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            border: none;
            transition: background-color 0.3s ease;
        }
        button:hover {
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
        <h1>Add Marks</h1>
        <div class="form-container">
            <form action="<?php echo site_url('marks/create'); ?>" method="post">

            
                <label for="record_id">Record ID:</label>
                <input type="text" name="record_id" id="record_id" value="<?php echo set_value('record_id'); ?>">
                <div class="error"><?php echo form_error('record_id'); ?></div>

                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" value="<?php echo set_value('subject'); ?>">
                <div class="error"><?php echo form_error('subject'); ?></div>

            
                <label for="marks">Marks</label>
                <input type="text" name="marks" id="marks" value="<?php echo set_value('marks'); ?>">
                <div class="error"><?php echo form_error('marks'); ?></div>
                <br>
                <button type="submit">Add Marks</button>
            </form>
        </div>
    </div>

</body>
</html>
