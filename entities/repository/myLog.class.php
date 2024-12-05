<?php 

class MyLog{
    public $log;

    public function __construct(string $filename)
    {
        $this->log = new Monolog\Logger('name');
        $this->log->pushHandler(
            new Monolog\Handler\StreamHandler('log/proyecto.log',Monolog\Level::Info)
        );
    }

    // public function add(string $message):void {
    //     $this->log->info($message);
    // }
}

?>