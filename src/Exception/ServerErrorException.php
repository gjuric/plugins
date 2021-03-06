<?php

namespace Http\Client\Plugin\Exception;

use Http\Client\Exception\HttpException;

/**
 * Thrown when there is a server error (5xx).
 *
 * @author Joel Wurtz <joel.wurtz@gmail.com>
 */
class ServerErrorException extends HttpException
{
}
