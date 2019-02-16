<?php


namespace Afup\Broker;


use Enqueue\Fs\FsConnectionFactory;
use Enqueue\Fs\FsDestination;

class FsBroker
{
    /**
     * @var \Enqueue\Fs\FsContext|\Interop\Queue\Context
     */
    private static $context;
    /**
     * @var FsDestination
     */
    private static $queue;

    /**
     * @return \Enqueue\Fs\FsContext|\Interop\Queue\Context
     */
    public static function getContext()
    {
        static::$context = static::$context ?? (new FsConnectionFactory('/tmp'))->createContext();
        return static::$context;
    }

    /**
     * @return mixed
     */
    public static function getQueue()
    {
        return static::$queue ?? static::$context->createQueue('afup');
    }
}