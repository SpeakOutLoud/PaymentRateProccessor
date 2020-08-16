<?php

namespace Base\Processor\ErrorManager;

class ErrorManager
{
    private $_fileUtilityManager;
    public function __construct($fileUtilityManager)
    {
        $this->$_fileUtilityManager = $fileUtilityManager;
    }

    public function logInfo($message)
    {

    }

    public function logError($message)
    {
        $content = $this->_fileUtilityManager->readFile();
        $content += "\r\n";
        $content += $content . ' - ' . date("Y-m-d H:i:s");
        $this->_fileUtilityManager->writeFile($content);
    }
}
