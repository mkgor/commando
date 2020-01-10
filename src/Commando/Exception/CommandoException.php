<?php

namespace Commando\Exception;

use Throwable;

/**
 * Class CommandoException
 * @package Exception
 */
class CommandoException extends \Exception
{
    /**
     * CommandoException constructor.
     * @param string $message
     * @param int $code
     */
    public function __construct($message = "", $code = 500)
    {
        parent::__construct(sprintf('Commando stopped work with message: %s', $message), $code);
    }
}