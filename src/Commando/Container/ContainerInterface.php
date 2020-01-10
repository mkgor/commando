<?php

namespace Commando\Container;

use Commando\Handler\HandlerInterface;

/**
 * Interface ContainerInterface
 * @package Container
 */
interface ContainerInterface
{
    /**
     * @param $commandName
     * @return mixed
     */
    public function getHandler($commandName);

    /**
     * @param $commandName
     * @param HandlerInterface $handler
     * @return mixed
     */
    public function setHandler($commandName, HandlerInterface $handler);
}