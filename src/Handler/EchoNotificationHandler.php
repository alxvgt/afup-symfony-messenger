<?php

namespace Afup\Handler;

use Afup\Message\NotificationMessage;

class EchoNotificationHandler
{
    public function __invoke(NotificationMessage $notification)
    {
        sleep(3);
        echo $notification->getContent();
    }
}