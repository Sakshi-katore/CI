<!DOCTYPE html>
<html>
<head>
    <title>Key-Value Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-left: 20px;
        }
        h1 {
            color: #444;
            margin-bottom: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 300px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin-top: 20px;
        }
        .result p {
            margin: 0;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Submit Key-Value Pair</h1>
        <form method="post" action="<?php echo site_url('KeyValueController/set_value'); ?>">
            <label for="key">Key:</label>
            <input type="text" id="key" name="key" required>
            <label for="value">Value:</label>
            <input type="text" id="value" name="value" required>
            <button type="submit">Submit</button>
        </form>

        <h1>View or Delete Value by Key</h1>
        <form method="post" action="<?php echo site_url('KeyValueController/fetch_value'); ?>" id="fetchForm">
            <label for="key_fetch">Key:</label>
            <input type="text" id="key_fetch" name="key" required>
            <button type="submit">Fetch Value</button>
        </form>

        <form method="post" action="<?php echo site_url('KeyValueController/delete_value'); ?>" id="deleteForm" style="display:inline;">
            <input type="hidden" id="key_delete" name="key">
            <button type="submit" onclick="setDeleteKey()">Delete</button>
        </form>

        <?php if (isset($value)) { ?>
            <div class="result">
                <h2>Result:</h2>
                <?php if ($value) { ?>
                    <p><strong>Key:</strong> <?php echo $value['key']; ?></p>
                    <p><strong>Value:</strong> <?php echo $value['value']; ?></p>
                <?php } else { ?>
                    <p>No value found for the given key.</p>
                <?php } ?>
            </div>
        <?php } ?>
    </div>

    <script>
        function setDeleteKey() {
            document.getElementById('key_delete').value = document.getElementById('key_fetch').value;
        }
    </script>
</body>
</html>
