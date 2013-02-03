<?php
/**
 * RequestResponse library (https://github.com/tomphp/WhiosLookup)
 *
 * @link https://github.com/tomphp/RequestResponse for the canonical source repository
 * @license http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3 (GPL-3.0)
 */

namespace RequestResponse\Communicator;

use BasicSocket\SocketInterface;
use RequestResponse\RequestInterface;
use RequestResponse\ResponseInterface;

/**
 * A generic communicator class that can be used to exchange multiple requests
 * and responses via a single connection.
 * 
 * @author Tom Oram
 */
class PersistentCommunicator implements CommunicatorInterface
{
    const LINE_ENDING = "\n";

    /**
     * The socket that will be used for communication.
     *
     * @var SocketInterface
     */
    private $socket;

    /**
     * This string that is looked for to know that a reponse has completed.
     *
     * @var string
     */
    private $responseEnding;

    /**
     * Constructor
     *
     * @param SocketInterface $socket
     * @param string          $responseEnding
     * 
     * @todo Check that the socket is connected
     */
    public function __construct(SocketInterface $socket, $reponseEnding)
    {
        $this->socket = $socket;
        $this->responseEnding = (string) $responseEnding;
    }

    /**
     * Disconnect if we're still connected.
     */
    public function __destruct()
    {
        $this->socket->disconnect();
    }

    /**
     * Write a string to the server connection.
     *
     * @param string $data
     */
    protected function write($data)
    {
        $this->socket->write($data . self::LINE_ENDING);
    }

    /**
     * Retrieve a response from the server.
     *
     * @return string
     *
     * @throws ConnectionDroppedException
     *
     * @todo Always UTF8 decode?
     */
    protected function read()
    {
        $data = '';

        // TODO Invesigate if a time out is required
        do {
            if ($this->socket->closed()) {
                throw new \Exception('The connection has been dropped.');
            }

            $data .= $this->socket->read();
        } while (!preg_match('!</epp>!', $data));

        return utf8_decode(substr($data, 4));
    }

    /**
     * Send a request to the server and construct an appropriate response.
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function getResponse(RequestInterface $request)
    {
        $this->write($request);

        return $request->getResponse()->init($this->read());
    }
}
