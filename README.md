# Commando
Commando is a simple implementation of \`Command\` pattern. It gives you simple to make your application
more flexible and expandable.

## Contents
- [Requirments](https://github.com/pixaye/commando#requirments)
- [Installation](https://github.com/pixaye/commando#installation)
- [Usage](https://github.com/pixaye/commando#usage)

## Requirments
The only requirement for now is a **PHP 7.1+**

## Installation
The easiest way of installation is an installtion via composer:

````
composer require pixaye/commando
````

## Usage

First of all, you should initialize and store **CommandBus** object

````php
<?php

$bus = new \Commando\Bus\StandardCommandBus([
    Commands\SomeCommand::class => new Handlers\SomeCommandHandler(),
    Commands\SomeAnotherCommand::class => new Handlers\SomeAnotherCommandHandler()
]);

````

Then, to dispatch command, you should create command object and call **dispatch** method of bus

````php
<?php

$bus = new \Commando\Bus\StandardCommandBus([
    Commands\RegisterNewUserCommand::class => new Handlers\RegisterNewUserCommandHandler(),
]);

//For example, we want to register new user
$registeredUser = $bus->dispatch(new Commands\RegisterNewUserCommand('John', 'Doe'));
````

Command is a simple PHP class, which can contain some properties which handler should use to do some action.

````php
<?php

namespace YourProject\Commands;

use Commando\Command\CommandInterface;

class RegisterNewUserCommand implements CommandInterface
{
    private $userId;
    
    private $password;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}
````

It will call **RegisterNewUserCommandHandler**'s handle method and return it

**Important!** - All handlers should implement Commando\Handler\HandlerInterface and every command should implement Commando\Command\CommandInterface

````php
<?php

namespace YourProject\Handlers;

use Commando\Handler\HandlerInterface;

class RegisterNewUserCommandHandler implements HandlerInterface
{
    /**
     * @param RegisterNewUserCommand $command
     * @return string
     */
    public function handle($command)
    {
        return 'User with id = ' . $command->getUserId() . ' and password = ' . $command->getPassword() . ' has been created';
    }
}
````

