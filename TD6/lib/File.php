<?php
class File {


    const DS = DIRECTORY_SEPARATOR;
    const ROOT_FOLDER = __DIR__.SELF::DS."..";
    
    
    public static function build_path($path_array) {
        return SELF::ROOT_FOLDER.SELF::DS.join(SELF::DS,$path_array);
    }
}
?>