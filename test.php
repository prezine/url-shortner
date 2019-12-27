<?php
    include_once 'app/controllers/TEST_Controller.php';
    $troubleshoot = new Troubleshooter();
    $filepath = "app/storage/";
    echo $troubleshoot->checkPermission($filepath).PHP_EOL;