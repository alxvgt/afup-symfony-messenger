<?php


namespace Afup\Sender;


use Afup\Broker\FsBroker;
use Afup\Broker\FsBrokerBridge;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\Sender\SenderInterface;

class FsNotificationSender implements SenderInterface
{
    /**
     * Sends the given envelope.
     * @param Envelope $envelope
     * @return Envelope
     * @throws \Interop\Queue\Exception
     * @throws \Interop\Queue\Exception\InvalidDestinationException
     * @throws \Interop\Queue\Exception\InvalidMessageException
     * @throws \Exception
     */
    public function send(Envelope $envelope): Envelope
    {
        $message = FsBrokerBridge::getBrokerMessage($envelope);

        FsBroker::getContext()->createProducer()->send(FsBroker::getQueue(), $message);

        return $envelope;
    }
}