<?php


namespace Commando\Bus;

use Commando\Command\CommandInterface;
use Container\ContainerInterface;

/**
 * Interface BusInterface
 * @package Bus
 */
interface BusInterface
{
    /**
     * @return ContainerInterface
     */
    public function getCommandContainer();

    /**
     * @param $command
     * @return mixed
     */
    public function dispatch(CommandInterface $command);
}