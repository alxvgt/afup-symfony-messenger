<?php


namespace Afup\Broker;


use Afup\Message\ExportAccountDataMessage;
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

        if (!$message instanceof ExportAccountDataMessage) {
            throw new \InvalidArgumentException('Not supported');
        }

        return FsBroker::getContext()->createMessage($message->getAccountId());
    }

    /**
     * @param Message $message
     * @return Envelope
     */
    public static function getEnvelopeMessage(Message $message)
    {
        return new Envelope(new ExportAccountDataMessage($message->getBody()));
    }
}