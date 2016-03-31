<?php

/**
 * Description of zipHandler
 *
 * 1 - unzip
 * 2 - zip?
 * 
 * @author jlhan
 */
class zipHandler {
   
    public function __construct() {
        
    }
    
    public function unzip ($file, $destination){
        //may need to clean out the destination first
        $zip = new ZipArchive();
        if($zip->open($file) === true){
            $zip->extractTo($destination);
            $zip->close();
        } else {
            throw new Exception("Unable to open $file");
        }
    }
    
    public function testUnzip ($file){
        $zip = new ZipArchive();
        $zip->open($file);
        echo "<pre>";
        print_r($zip);
        echo "</pre>";
        
        for ($i=0; $i<$zip->numFiles;$i++) {
        echo "index: $i<br/>";
        print_r($zip->statIndex($i));
        echo "<br/>";
        }
    }
    
    /**
     * Scan the directory to determine folder/file structure
     */
    public function scanDirectory(){
        
    }
}
