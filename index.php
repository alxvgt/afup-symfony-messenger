<?php

use Afup\Bus\BusFactory;
use Afup\Handler\EchoNotificationHandler;
use Afup\Message\NotificationMessage;
use Afup\Sender\FsNotificationSender;

require_once __DIR__.'/vendor/autoload.php';

$handler = new EchoNotificationHandler();
$sender = new FsNotificationSender();

$bus = BusFactory::createBus(
    [
        NotificationMessage::class => ['echo' => $handler],
    ],
    [
        NotificationMessage::class => ['echo' => $sender]
    ]
);


/**
 * Program !
 */
for ($i = 1; $i < 50; $i++) {
    $notification = new NotificationMessage("Ceci est mon test n°$i \n");
    echo "New notification dispatched ! \n";
    $bus->dispatch($notification);
}
