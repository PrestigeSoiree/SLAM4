<?php
class File{
    
    public static function build_path($path_array) {
   
    $ROOT_FOLDER = __DIR__."\..";
    $DS = DIRECTORY_SEPARATOR;
    return $ROOT_FOLDER. '\\' .($path_array);
 
    }
}
?>