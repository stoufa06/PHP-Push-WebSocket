<?php
namespace PushWebSocket;
use \Server;

class TestServer extends Server {


    
    
    
    public function __construct($address = '127.0.0.1', $port = 5001, $verboseMode = false){
        
        parent::__construct($address, $port, $verboseMode);
       
        
        $this->setDataSource(function()  {
            $fh = fopen('/proc/meminfo','r');
            $mem = 0;
            while ($line = fgets($fh)) {
                $pieces = array();
                if (preg_match("/^MemTotal:\s+(\d+)\skB$/", $line, $pieces)) {
                    $mem = $pieces[1];
                    break;
                }
            }
            fclose($fh);

            return "$mem kB RAM found"; ?>
             
        });
    }
}