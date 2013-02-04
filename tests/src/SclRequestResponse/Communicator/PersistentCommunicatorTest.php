<?php
/**
 * SclRequestResponse library (https://github.com/SCLInternet/SclWhois)
 *
 * @link https://github.com/SCLInternet/SclRequestResponse for the canonical source repository
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace SclRequestResponse\Communicator;

/**
 * Test for {@see PersistentCommunicator}
 *
 * @author Tom Oram <tom@scl.co.uk>
 */
class PersistentCommunicatorTest extends \PHPUnit_Framework_TestCase
{
    const RESPONSE_ENDING = '!</response>!';

    /**
     * @var PersistentCommunicator
     */
    private $communicator;

    /**
     * @var \SclSocket\SocketInterface
     */
    private $socket;

    protected function setUp()
    {
        $this->socket = $this->getMock('SclSocket\SocketInterface');

        $this->communicator = new PersistentCommunicator($this->socket, self::RESPONSE_ENDING);
    }

    /**
     * @covers \SclRequestResponse\Communicator\PersistentCommunicator::connect
     */
    public function testConnect()
    {
        $host = 'my.host.com';
        $port = 77;
        $ssl = true;

        $this->socket->expects($this->once())
            ->method('setBlocking')
            ->with($this->equalTo(false));

        $this->socket->expects($this->once())
            ->method('connect')
            ->with($this->equalTo($host), $this->equalTo($port), $this->equalTo($ssl))
            ->will($this->returnValue(true));

        $this->communicator->connect($host, $port, $ssl);
    }

    /**
     * @expectedException \SclRequestResponse\Exception\ConnectionFailedException
     */
    public function testFailedConnect()
    {
        $host = 'my.host.com';
        $port = 77;
        $ssl = false;

        $this->socket->expects($this->once())
            ->method('connect')
            ->with($this->equalTo($host), $this->equalTo($port), $this->equalTo($ssl))
            ->will($this->returnValue(false));

        $this->communicator->connect($host, $port, $ssl);
    }

    /**
     * @covers \SclRequestResponse\Communicator\PersistentCommunicator::connect
     */
    public function testGetResponse()
    {
        // @todo write me!
    }
}
