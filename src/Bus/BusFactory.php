<?php

namespace Afup\Bus;

use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;
use Symfony\Component\Messenger\Middleware\SendMessageMiddleware;
use Symfony\Component\Messenger\Transport\Sender\SendersLocator;

class BusFactory
{

    /**
     * @param array $handlers
     * @param array $senders
     * @return MessageBus
     */
    public static function createBus(array $handlers, array $senders = [])
    {
        return new MessageBus([
                new HandleMessageMiddleware(
                    new HandlersLocator($handlers)
                ),
                new SendMessageMiddleware(
                    new SendersLocator($senders)
                ),
            ]
        );
    }


}