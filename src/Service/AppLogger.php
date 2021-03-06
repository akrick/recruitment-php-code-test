<?php

namespace App\Service;
use think\facade\Log as ThinkLog;
class AppLogger
{
    const TYPE_LOG4PHP = 'log4php';
    const TYPE_THINKLOG = 'think-log';

    private $logger;
    private $isUpperCase = false;

    public function __construct($type = self::TYPE_LOG4PHP)
    {
        if ($type == self::TYPE_LOG4PHP) {
            $this->logger = \Logger::getLogger("Log");
        }elseif ($type == self::TYPE_THINKLOG){
            $this->isUpperCase = true;
            $options = [
                'default'	=>	'file',
                'channels'	=>	[
                    'file'	=>	[
                        'type'	=>	'file',
                        'path'	=>	'./logs/',
                    ],
                ],
            ];

            $this->logger = ThinkLog::instance($options);
        }
    }

    public function info($message = '')
    {
        if ($this->isUpperCase){
            $message = strtoupper($message);
        }
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        if ($this->isUpperCase){
            $message = strtoupper($message);
        }
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        if ($this->isUpperCase){
            $message = strtoupper($message);
        }
        $this->logger->error($message);
    }
}
