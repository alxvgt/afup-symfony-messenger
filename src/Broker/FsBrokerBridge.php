<?php


namespace Afup\Broker;


use Afup\Message\NotificationMessage;
use Interop\Queue\Message;
use Symfony\Component\Messenger\Envelope;

class FsBrokerBridge
{
    /**
     * @param Envelope $envelope
     * @return \Enqueue\Fs\FsMessage|Message
     */
    public static function getBrokerMessage(Envelope $envelope)
    {
        $message = $envelope->getMessage();

        if (!$message instanceof NotificationMessage) {
            throw new \InvalidArgumentException('Not supported');
        }

        return FsBroker::getContext()->createMessage($message->getContent());
    }

    /**
     * @param Message $message
     * @return Envelope
     */
    public static function getEnvelopeMessage(Message $message)
    {
        return new Envelope(new NotificationMessage($message->getBody()));
    }
}