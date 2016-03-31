<?php

spl_autoload_register(function ($class_name) {
    include 'classes/'. $class_name . '.php';
    });
    
$zipper = new zipHandler();
//$zipper->testUnzip('uploads/testPPT.zip');
$zipper->unzip('uploads/testPPT.zip', 'workspace');