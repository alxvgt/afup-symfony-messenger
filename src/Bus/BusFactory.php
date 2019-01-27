<?php

namespace Afup\Bus;

use Afup\Handler\ExportAccountDataHandler;
use Afup\Handler\RemoveAccountHandler;
use Afup\Message\ExportAccountDataMessage;
use Afup\Message\RemoveAccountMessage;
use Afup\Sender\FsMessageSender;
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
                new SendMessageMiddleware(
                    new SendersLocator($senders)
                ),
                new HandleMessageMiddleware(
                    new HandlersLocator($handlers)
                ),

            ]
        );
    }

    /**
     * @return MessageBus
     */
    public static function createDefaultBus()
    {
        $removeHandler = new RemoveAccountHandler();
        $exportHandler = new ExportAccountDataHandler();
        $sender = new FsMessageSender();

        return BusFactory::createBus(
            [
                RemoveAccountMessage::class     => ['remove' => $removeHandler],
                ExportAccountDataMessage::class => ['export' => $exportHandler],
            ],
            [
                ExportAccountDataMessage::class => ['export' => $sender],
            ]
        );
    }


}