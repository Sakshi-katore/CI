<?php
// Test if the temporary directory exists
$test_dir = 'C:/inetpub/temp';

if (is_dir($test_dir)) {
    echo 'Temporary directory exists.';
} else {
    echo 'Temporary directory does not exist.';
}
?>
