<?php

namespace Commando\Container;

use Commando\Exception\CommandoException;
use Commando\Handler\HandlerInterface;

/**
 * Class CommandRepository
 * @package Commando\Repository
 */
class HandlerContainer implements ContainerInterface
{
    /**
     * @var HandlerInterface[]
     */
    protected $container;

    /**
     * @return HandlerInterface[]
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param HandlerInterface[] $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     * @param string $command
     * @param HandlerInterface $handler
     */
    public function setHandler($command, HandlerInterface $handler)
    {
        $this->container[$command] = $handler;
    }

    /**
     * @param string $command
     * @return HandlerInterface
     * @throws CommandoException
     */
    public function getHandler($command)
    {
        if(isset($this->container[$command])) {
            return $this->container[$command];
        } else {
            throw new CommandoException(sprintf('Command %s not found in HandlerRepository', $command));
        }
    }
}