<?php

/**
 * Description of fileHandler
 *
 * @author jlhan
 */
class fileHandler {
    
    private $_name;
    private $_type;
    private $_tmp_name;
    private $_index;
    private $_dest = 'uploads/';
    
    public function __construct($index) {
     
        if(empty($_FILES)){
            throw new Exception("No file was uploaded");
        }
        
        $this->_name = $_FILES[$index]['name'];
        $this->_type = $_FILES[$index]['type'];
        $this->_tmp_name = $_FILES[$index]['tmp_name'];
        $this->_index = $index;
        
        
    }
    
    public function checkFile($type){
        
        $target_file = $_FILES[$this->_index]['name'];
        $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        if($fileType != $type){
            //echo "File is not a valid PowerPoint (.pptx) file.";
            throw new Exception("File is not a valid .$type file.");
            
        } else {
            //echo "Your file is a valid PowerPoint (.pptx) file.";
            return true;
        }
    }
    
    public function moveFile($convertFile = true, $fileType = 'zip'){
        
        if($convertFile){
            $fileName = pathinfo($this->_name, PATHINFO_FILENAME);
            $target = $this->_dest.$fileName.'.'.$fileType;
        } else {
            $target = $this->_dest.$this->_name;
        }
        
        echo "Target is $target<br />";        
        if (move_uploaded_file($this->_tmp_name, $target)) {
            //echo "The file ". basename( $_FILES[$this->_index]["name"]). " has been uploaded.";
            return $target;
        } else {
            throw new Exception("Sorry, there was an error uploading your file. Contact the administrator.");
            
        }
    }
}
