<?php

namespace Commando\Bus;

use Commando\Command\CommandInterface;
use Commando\Exception\CommandoException;
use ReflectionClass;
use ReflectionException;

/**
 * Class CommandBus
 *
 * @package Bus
 */
class StandardCommandBus extends AbstractBus implements BusInterface
{
    /**
     * CommandBus constructor.
     *
     * @param array $handlers
     */
    public function __construct(array $handlers)
    {
        foreach($handlers as $command => $handler) {
            $this->getCommandContainer()->setHandler($command, $handler);
        }
    }

    /**
     * Executes command
     *
     * @param CommandInterface $command
     *
     * @return mixed
     *
     * @throws ReflectionException
     * @throws CommandoException
     */
    public function dispatch(CommandInterface $command)
    {
        $commandClassReflection = new ReflectionClass($command);
        $commandClassName = $commandClassReflection->getName();

        return $this->getCommandContainer()->getHandler($commandClassName)->handle($command);
    }
}