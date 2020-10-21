<?php 
namespace App\Components;

use Exception;
use App\Components\File\File;

class Alpha
{
    /** the settings for Alpha file manager
     * @var array
     */
    private $settings = [];

    /** default root path for files and folders
     * listing
     * @var string
     */
    private $rootPath;

    /**
     * file list from root directory
     * @var array
     */
    private $fileList = [];

    /** 
     * @throws Exception
     */
    public function __construct(array $settings)
    {
        $this->checkSettings($settings);
        $this->settings = $settings;
        $this->rootPath = $settings["root"];
        $this->fileList = $this->list();
    }

    public function checkSettings($settings)
    {
        if ($settings === null) {
            throw new Exception("settings must not be null");
        }
        if (!isset($settings["root"])) {
            throw new Exception("root path not found");
        }else{
            if(!isset($settings["file"])){
                throw new Exception("file setting not found");  
            }else{
                if(!isset($settings["file"]["extensions"])){
                    throw new Exception("allowed extensions not found");  
                }
                if(!isset($settings["file"]["mime_type"])){
                    throw new Exception("mime type not found");  
                }
                if(!isset($settings["file"]["max_size"])){
                    throw new Exception("max size not found");  
                }
            }
        }
    }

    public function renameFile(string $filename, $newFileName):bool
    {
        return rename($filename, $newFileName);
    }

    public function moveFile(string $filename, $newFileName):bool
    {
        return $this->renameFile($filename, $newFileName);
    }

    public function deleteFile($filename):bool
    {
        return unlink($filename);
    }

    /**
     * upload a file to a special directory
     * return true if is ok 
     *
     * @param string $file
     * @param string $directory
     * @return string|bool
     */
    public function uploadFile($file, $directory)
    {
        $errors = [];
        $fileName = $file["name"];
        $fileSize = $file["size"];
        $fileTmpName = $file["tmp_name"];
        $fileType = $file["type"];
        $explode = explode(".", $file["name"]);
        $fileExt = strtolower(end($explode));
        
        if ( !in_array(strtolower($fileExt), $this->settings["file"]["extensions"]) ) {
            $errors[] = "extension not allowed.";
        }
        if ( !in_array(strtolower($fileType), $this->settings["file"]["mime_type"]) ) {
            $errors[] = "mime type not allowed.";
        }
        if ( $fileSize >  $this->settings["file"]["max_size"]) {
            $errors[] = "file size must be lower or equal than ".$this->settings["file"]["max_size"];
        }

        if (!empty($errors)) {
            return $errors;
        }
        return move_uploaded_file($fileTmpName, $directory.$fileName);
    }

    /**
     * list files in root directory
     * @return array
     */
    private function list():array
    {
        $list = scandir($this->rootPath);
        $output = [];
        for ($i=0; $i < count($list); $i++) { 
            if (is_dir($list[$i])) {
                //array_push($output, $list[$i]);
            } else {
                $file = new File($this->rootPath."/".$list[$i]);
                array_push($output, $file);
            }
        }
        return $output;
    }

    /**
     * Get file list from root directory
     * @return  array
     */ 
    public function getFileList()
    {
        return $this->fileList;
    }
}
