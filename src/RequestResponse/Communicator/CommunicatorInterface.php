<?php
/**
 * RequestResponse library (https://github.com/tomphp/WhiosLookup)
 *
 * @link https://github.com/tomphp/RequestResponse for the canonical source repository
 * @license http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3 (GPL-3.0)
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
