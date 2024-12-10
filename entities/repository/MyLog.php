<?php 

namespace proyecto\entities\repository;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Level;

class MyLog{
    public $log;

    public function __construct(string $filename)
    {
        $this->log = new Logger('name');
        $this->log->pushHandler(
            new StreamHandler('log/proyecto.log',Level::Info)
        );
    }

    // public function add(string $message):void {
    //     $this->log->info($message);
    // }
}

?>