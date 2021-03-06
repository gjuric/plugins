<?php

namespace Http\Client\Plugin;

use Psr\Http\Message\RequestInterface;

/**
 * Adds headers to the request.
 * If the header already exists the value will be appended to the current value.
 *
 * This only makes sense for headers that can have multiple values like 'Forwarded'
 *
 * @link https://en.wikipedia.org/wiki/List_of_HTTP_header_fields
 *
 * @author Soufiane Ghzal <sghzal@gmail.com>
 */
class HeaderAppendPlugin implements Plugin
{
    private $headers = [];

    /**
     * @param array $headers headers to add to the request
     */
    public function __construct(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * {@inheritdoc}
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first)
    {
        foreach ($this->headers as $header => $headerValue) {
            $request = $request->withAddedHeader($header, $headerValue);
        }

        return $next($request);
    }
}
