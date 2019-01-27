<?php

namespace Afup\Message;

class RemoveAccountMessage
{
    /**
     * @var int
     */
    private $accountId;

    /**
     * RemoveAccountMessage constructor.
     * @param int $accountId
     */
    public function __construct(int $accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return string
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

}