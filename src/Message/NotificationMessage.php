<?php

namespace Afup\Message;

class NotificationMessage
{
    /**
     * @var string
     */
    private $content;

    /**
     * NotificationMessage constructor.
     * @param $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

}