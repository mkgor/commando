<?php

namespace Commando\Handler;

use Commando\Command\CommandInterface;

/**
 * Interface HandlerInterface
 * @package Commando\Handler
 */
interface HandlerInterface
{
    /**
     * @param CommandInterface $command
     * @return mixed
     */
    public function handle($command);
}