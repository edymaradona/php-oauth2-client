<?php

/**
 * Copyright (c) 2016, 2017 François Kooman <fkooman@tuxed.net>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace fkooman\OAuth\Client\Exception;

use Exception;
use fkooman\OAuth\Client\Http\Response;

/**
 * Problem obtaining access_token from token endpoint. This exception also
 * stores the Response object from the Authorization Server token endpoint,
 * to ease debugging.
 */
class TokenException extends OAuthException
{
    /** @var \fkooman\OAuth\Client\Http\Response */
    private $response;

    /**
     * @param string $message
     * @param int    $code
     */
    public function __construct($message, Response $response, $code = 0, Exception $previous = null)
    {
        $this->response = $response;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return \fkooman\OAuth\Client\Http\Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}