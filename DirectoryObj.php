<?php
/**
 * Directory folders and files with path
 *
 * Created by Md. Mahedi Azad.
 * User: Public
 * Date: 9/18/14
 * Time: 11:42 AM
 *
 * Use: $folders = new DirectoryObj(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR.'test'); //test is the target folder
 *
 */

class DirectoryObj {
    public $dirPath;

    public function __construct( $path )
    {
        $this->dirPath = $path;

    }

    /*
     * List of sub folder paths
     * @return array list of sub folders
     *
     * Use: $folders->getSubFolders(); //get all of sub folders of test folder
     *
     */

    public function getSubFolders()
    {
        $allSubFolders = array();

        //using the opendir function
        $dir_handle = @opendir( $this->dirPath ) or die("Unable to open sub folder:  $this->dirPath ");

        while (false !== ($file = readdir($dir_handle)))
        {
            if($file!="." && $file!="..")
            {
                if (is_dir( $this->dirPath."/".$file))
                {
                    $folderInfo = array(
                        'name' => $file,
                        'path' => $this->dirPath .DIRECTORY_SEPARATOR .$file
                    );
                    if( count($folderInfo) > 0 )
                        $allSubFolders[] = array($folderInfo);

                }
                else
                {
                    continue;
                }
            }
        }
        //closing the directory
        closedir($dir_handle);

        return  $allSubFolders;
    }




    /*
     * Get list of files of a folder
     *
     * @param $folderPath string is full/root path of a folder
     * @return array list of files
     *
     * Use: $folders->->getfiles(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR.'test'); //test is the folder name
     *
     */
    public function getFiles( $folderPath = '' )
    {

        if($folderPath == '')
        {
            $folderPath =  $this->dirPath;
        }

        $allFilesPath = array();

        //using the open dir function
        $dir_handle = @opendir($folderPath) or die("Unable to open file path: $folderPath");

        while (false !== ($file = readdir($dir_handle)))
        {
            if($file!="." && $file!="..")
            {
                if ( is_dir( $folderPath."/".$file ) )
                {
                    continue;
                }
                elseif(end(explode(".", $file)) == 'php')
                {
                    //list of files.
                    $fileInfo = array(
                        'name' =>  $file,
                        'path' =>  $folderPath. DIRECTORY_SEPARATOR.$file
                    );
                    if( count($fileInfo) > 0 )
                        $allFilesPath[] = $fileInfo;
                }
            }

        }
        //closing the directory
        closedir($dir_handle);

        return  $allFilesPath;
    }

}





