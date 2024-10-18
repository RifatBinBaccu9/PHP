<?php
// সব ধরনের ত্রুটির জন্য error_reporting সেট করা
error_reporting(E_ALL);

// কাস্টম error handler
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    echo "Error [$errno]: $errstr in $errfile on line $errline\n";
});

// Exception হ্যান্ডলিং
set_exception_handler(function ($exception) {
    echo "Exception: " . $exception->getMessage();
});

// Fatal error হ্যান্ডেল করার জন্য shutdown function
register_shutdown_function(function () {
    $error = error_get_last();
    if ($error !== null && $error['type'] === E_ERROR) {
        echo "Fatal Error: " . $error['message'];
    }
});
?>
