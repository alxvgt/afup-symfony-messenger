<?php

namespace Afup\Handler;

use Afup\Message\RemoveAccountMessage;

class RemoveAccountHandler
{
    /**
     * @param RemoveAccountMessage $message
     */
    public function __invoke(RemoveAccountMessage $message)
    {
        echo "Compte ".$message->getAccountId()." supprimé !\n";
    }
}