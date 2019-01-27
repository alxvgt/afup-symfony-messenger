<?php

use Afup\Bus\BusFactory;
use Afup\Message\ExportAccountDataMessage;
use Afup\Message\RemoveAccountMessage;

require_once __DIR__.'/vendor/autoload.php';

$bus = BusFactory::createDefaultBus();

/**
 * RGPD attack !
 */
for ($i = 1; $i < 50; $i++) {

    if (rand(0, 1)) {
        $message = new RemoveAccountMessage($i);
        $type = 'remove';
    } else {
        $message = new ExportAccountDataMessage($i);
        $type = 'export';
    }

    echo "New $type message dispatched ! \n";
    $bus->dispatch($message);
}
