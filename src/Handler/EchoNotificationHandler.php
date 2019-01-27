<?php

namespace Afup\Handler;

use Afup\Message\NotificationMessage;

class EchoNotificationHandler
{
    /**
     * @param NotificationMessage $notification
     */
    public function __invoke(NotificationMessage $notification)
    {
        sleep(3);
        echo $notification->getContent();
    }
}