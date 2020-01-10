<?php

namespace Commando\Bus;

use Commando\Container\HandlerContainer;
use Commando\Container\ContainerInterface;

/**
 * Class AbstractBus
 * @package Bus
 */
abstract class AbstractBus
{
    /**
     * @var HandlerContainer
     */
    private $commandContainer;

    /**
     * @return HandlerContainer
     */
    public function getCommandContainer()
    {
        if(!($this->commandContainer instanceof ContainerInterface)) {
            $this->commandContainer = new HandlerContainer();
        }

        return $this->commandContainer;
    }

    /**
     * @param HandlerContainer $commandContainer
     */
    public function setCommandContainer($commandContainer)
    {
        $this->commandContainer = $commandContainer;
    }
}