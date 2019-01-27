<?php


namespace Afup\Receiver;


use Afup\Broker\FsBroker;
use Afup\Broker\FsBrokerBridge;
use Symfony\Component\Messenger\Transport\Receiver\ReceiverInterface;

class FsNotificationReceiver implements ReceiverInterface
{

    /**
     * Receive some messages to the given handler.
     *
     * The handler will have, as argument, the received {@link \Symfony\Component\Messenger\Envelope} containing the message.
     * Note that this envelope can be `null` if the timeout to receive something has expired.
     * @param callable $handler
     */
    public function receive(callable $handler): void
    {
        $message = FsBroker::getContext()->createConsumer(FsBroker::getQueue())->receive();

        $envelope = FsBrokerBridge::getEnvelopeMessage($message);

        $handler($envelope);
    }

    /**
     * Stop receiving some messages.
     */
    public function stop(): void
    {
        // noop
    }
}