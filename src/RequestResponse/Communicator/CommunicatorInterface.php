<?php
/**
 * RequestResponse library (https://github.com/tomphp/WhiosLookup)
 *
 * @link https://github.com/tomphp/RequestResponse for the canonical source repository
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace RequestResponse\Communicator;

use RequestResponse\RequestInterface;
use RequestResponse\ResponseInterface;

/**
 * Sets up communication with the Nominet EPP server and sends requests and
 * processes the responses.
 * 
 * @author Tom Oram
 */
interface CommunicatorInterface
{
    /**
     * Send a request to the server and construct an appropriate response.
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function getResponse(RequestInterface $request);
}
