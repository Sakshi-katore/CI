<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Key</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            position: relative;
        }
        h2 {
            margin-top: 0;
            color: #333;
            display: inline-block;
        }
        .back-link {
            display: inline-block;
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 20px;
        }
        .back-link:hover {
            background-color: #218838;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="datetime-local"] {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .error {
            color: #d9534f;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Key</h2>
        <a href="<?php echo site_url('keys'); ?>" class="back-link">Back to Keys</a>
        
        <?php if (validation_errors()): ?>
            <div class="error">
                <?php echo validation_errors(); ?>
            </div>
        <?php endif; ?>
        
        <?php echo form_open('keys/edit/'.$key['id']); ?>
        
            <label for="date_key">Date:</label>
            <input type="date" id="date_key" name="date_key" value="<?php echo set_value('date_key', $key['date_key']); ?>">
            
            <label for="company_name">Company Name:</label>
            <input type="text" id="company_name" name="company_name" value="<?php echo set_value('company_name', $key['company_name']); ?>">
            
            <label for="company_address">Company Address:</label>
            <input type="text" id="company_address" name="company_address" value="<?php echo set_value('company_address', $key['company_address']); ?>">
            
            <label for="email1">Email 1:</label>
            <input type="email" id="email1" name="email1" value="<?php echo set_value('email1', $key['email1']); ?>">
            
            <label for="email2">Email 2:</label>
            <input type="email" id="email2" name="email2" value="<?php echo set_value('email2', $key['email2']); ?>">
            
            <label for="dateTime">Date Time:</label>
            <input type="datetime-local" id="dateTime" name="dateTime" value="<?php echo set_value('dateTime', $key['dateTime']); ?>">
            
            <label for="company_number">Company Number:</label>
            <input type="text" id="company_number" name="company_number" value="<?php echo set_value('company_number', $key['company_number']); ?>">
            
            <input type="submit" value="Update Key">
        
        </form>
    </div>
</body>
</html>
