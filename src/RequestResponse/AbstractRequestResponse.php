<?php
/**
 * RequestResponse library (https://github.com/tomphp/WhiosLookup)
 *
 * @link https://github.com/tomphp/RequestResponse for the canonical source repository
 * @license http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3 (GPL-3.0)
 */

namespace RequestResponse;

use RequestResponse\Communicator\CommunicatorInterface;

/**
 * A basic abstract class that can be extended to create the interface to the
 * request/response API.
 *
 * @author Tom Oram <tom@scl.co.uk>
 */
abstract class AbstractRequestResponse
{
    /**
     * The class that will be used to communicate with the server.
     *
     * @var CommunicatorInterface
     */
    private $communicator;

    /**
     * The response object.
     *
     * @var ResponseInterface
     */
    private $response;

    /**
     * Save the communicator object.
     *
     * @param CommunicatorInterface $communicator
     *
     * @return void
     */
    public function setCommunicator(CommunicatorInterface $communicator)
    {
        $this->communicator = $communicator;
    }

    /**
     * Sends the request to the server and hands back the response.
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function processRequest(RequestInterface $request)
    {
        $this->response = $this->communicator->getResponse($request);

        return $this->response;
    }

    /**
     * Returns the last response object.
     *
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }
}
