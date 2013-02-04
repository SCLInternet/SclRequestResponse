<?php
/**
 * SclRequestResponse library (https://github.com/SCLInternet/SclWhois)
 *
 * @link https://github.com/SCLInternet/SclRequestResponse for the canonical source repository
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace SclRequestResponse\Communicator;

use SclRequestResponse\RequestInterface;
use SclRequestResponse\ResponseInterface;

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
