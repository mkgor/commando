<?php

namespace Commando\Handler;

use Commando\Command\CommandInterface;
use Commando\Exception\CommandoException;

/**
 * Class AbstractHandler
 *
 * @package Commando
 */
abstract class AbstractHandler
{
    /**
     * @param CommandInterface $command
     * @throws CommandoException
     */
    public function handle(CommandInterface $command)
    {
        throw new CommandoException("Method `handler` is not implemented in handler");
    }
}