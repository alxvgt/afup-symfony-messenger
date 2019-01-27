<?php

use Afup\Bus\BusFactory;
use Afup\Handler\EchoNotificationHandler;
use Afup\Message\NotificationMessage;
use Afup\Receiver\FsNotificationReceiver;
use Symfony\Component\Messenger\Worker;

require_once __DIR__.'/vendor/autoload.php';

$handler = new EchoNotificationHandler();

$bus = BusFactory::createBus(
    [
        NotificationMessage::class => ['echo' => $handler],
    ],
);

$receiver = new FsNotificationReceiver();

$worker = new Worker($receiver, $bus);
$worker->run();