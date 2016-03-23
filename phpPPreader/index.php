<?php
    spl_autoload_register(function ($class_name) {
    include 'classes/'. $class_name . '.php';
    });
    
    
if(isset($_FILES) && empty($_FILES) === false) :

    echo "Files array contains:<br />";
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    
    try {
        $upload = new fileHandler('userfile'); 
        $upload->checkFile();
        $upload->moveFile();

        //fileHandler::checkFile();
    }
    
    
    catch (Exception $e) {
        $eMsg =  'PowerPoint Template Failure: ' .$e->getMessage() . '; Failure trace: '. $e->getTraceAsString();
        error_log($eMsg);
        echo 'Template upload failure: '. $e->getMessage().'<br />';
    }

endif;

?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <!-- The data encoding type, enctype, MUST be specified as below -->
        <form enctype="multipart/form-data" action="index.php" method="POST">
            <!-- MAX_FILE_SIZE must precede the file input field -->
            <!--<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
            <!-- Name of input element determines name in $_FILES array -->
            Send this file: <input name="userfile" type="file" />
            <input type="submit" value="Send File" />
        </form>

    </body>
</html>
