<!DOCTYPE html>
<html>
<head>
    <title>Company Information</title>
</head>
<body>
    <div class="container">
        <h1>Company Information</h1>
        <?php if (get_company_info('company_Number') || get_company_info('Company_name') || get_company_info('email')) { ?>
            <p><strong>Company Name:</strong> <?php echo get_company_info('Company_name'); ?></p>
            <p><strong>Company Number:</strong> <?php echo get_company_info('company_Number'); ?></p>
            <p><strong>Name:</strong> <?php echo get_company_info('Company_name'); ?></p>
            <p><strong>Email:</strong> <?php echo get_company_info('email'); ?></p>
            <p><strong>Date:</strong> <?php echo get_company_info('Date'); ?></p>
        <?php } else { ?>
            <p>No company information available.</p>
        <?php } ?>
    </div>
</body>
</html>
