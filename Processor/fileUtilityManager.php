<?php

namespace Base\Processor\FileUtilityManager;

class FileUtilityManager
{
    private $_filename = '';
    public function __construct($filename)
    {
        $this->_filename = $filename;
    }

    function readFile()
    {
        if($this->_filename != null && file_exists($this->_filename))
        {
            return file_get_contents($this->_filename);
        }
        return "";
    }

    function writeFile($data)
    {
        file_put_contents($filename, $data);
    }
}