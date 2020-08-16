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
        constructMessage($message, 'info');
    }

    public function logError($message)
    {
        constructMessage($message, 'error');
    }

    function constructMessage($message, $type)
    {
        if($type == 'info')
        {
            $message += $message . ' - info ';
        }
        else if($type == 'error')
        {
            $message += $message . ' - error ';
        }

        $content = $this->_fileUtilityManager->readFile();
        $content += "\r\n";
        $content += $message . ' - ' . date("Y-m-d H:i:s");
        $this->_fileUtilityManager->writeFile($content);
    }
}
