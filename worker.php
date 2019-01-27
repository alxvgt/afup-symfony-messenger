<?php

use Afup\Bus\BusFactory;
use Afup\Receiver\FsMessageReceiver;
use Symfony\Component\Messenger\Worker;

require_once __DIR__.'/vendor/autoload.php';

$bus = BusFactory::createDefaultBus();
$receiver = new FsMessageReceiver();
$worker = new Worker($receiver, $bus);

while(true){
    $worker->run();
}
