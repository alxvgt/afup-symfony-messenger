<?php

namespace Afup\Handler;

use Afup\Message\ExportAccountDataMessage;

class ExportAccountDataHandler
{
    /**
     * @param ExportAccountDataMessage $message
     */
    public function __invoke(ExportAccountDataMessage $message)
    {
        sleep(5);
        echo "Compte ".$message->getAccountId()." exporté !\n";
    }
}